<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa, App\Pengguna;
use Illuminate\Support\Facades\Auth;
use App\User, Storage;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\File;
use App\Http\Resources\MahasiswaPelanggaran as ResourcePelanggaran;
use App\Http\Resources\MahasiswaPresensi as ResourcePresensi;
use App\Http\Resources\MahasiswaBarang as ResourceBarang;
use DB;
class ValidasiController extends Controller
{
    public function showLogin()
    {
        return view('validasi.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1()
    {
        //Read Auth        
        $pengguna = Auth::user();
        if ($pengguna->recups()->get()->count() != 0)
        {
            $message = "0;Anda tercatat sudah pernah mengisi form validasi data kelengkapan Anda.Merasa tidak pernah mengisi data kelengkapan? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya .";
            return redirect()->route('login')->with('message', $message);
        }
        
        $recups = \App\Recup::orderBy('Nama')->get();
        $kelompoks = Auth::user()->mahasiswa->kelompoks()->orderBy('Kelompok')->get();

        $a = isset($kelompoks[0])?$kelompoks[0]->Kelompok:'-';
        $b = isset($kelompoks[1])?$kelompoks[1]->Kelompok:'-';
        return view('validasi.create', compact('a', 'b', 'recups'));
    }

    public function store1(Request $request)
    {
        //
        $validatedData = $request->validate([
            'penyakit' => 'required',
            'minat1' => 'required',
            'minat2' => 'required',
            'penyangkalan' => 'required',
            'prestasi' => 'mimes:jpeg,png,jpg'
        ]);

        $pengguna = User::find(Auth::id());
        $pengguna->Penyakit = $request->penyakit == "Y" ? $request->penyakit_detail : null;
        
        $link = null;
        if ($request->prestasi != null)
        {            
            $custom_file_name = Auth::id().".".\File::extension($request->file('prestasi')->getClientOriginalName());
            $link = $request->file('prestasi')->storeAs('bukti',$custom_file_name);
        }

        $pengguna->recups()->attach($request->minat1, ['Prioritas'=>1, 'Bukti'=>$link, 'Diterima'=>0]);
        $pengguna->recups()->attach($request->minat2, ['Prioritas'=>0, 'Bukti'=>null, 'Diterima'=>0]);
        $pengguna->save();
        
        $n1 = \App\Recup::find($request->minat1)->Nama;
        $n2 = \App\Recup::find($request->minat2)->Nama;
        return redirect()->route('login')->with('message', "1;Terima kasih, validasi data berhasil!<br>Data yang Anda masukkan adalah sebagai berikut:<br><br>Penyakit : $pengguna->Penyakit <br>Pilihan 1 : $n1<br>Pilihan 2 : $n2<br><br>Apabila terdapat kesalahan pada pengisian data, kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2018 melalui sosial media yang ada.");
    }

    public function create2()
    {
        $pengguna = Auth::user()->mahasiswa;
        if ($pengguna->ormawas()->get()->count() != 0)
        {
            $message = "0;Anda tercatat sudah pernah mengisi form validasi data kelengkapan Anda.Merasa tidak pernah mengisi data kelengkapan? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya .";
            return redirect()->route('login')->with('message', $message);
        }


        $ormawas = \App\Ormawa::all();
        return view('validasi.tahap2', compact('ormawas'));
    }

    public function store2(Request $request)
    {
        $validatedData = $request->validate([
            'minat1' => 'required',
            'minat2' => 'required',
            'nomorhp' => 'required|min:10|max:13',
            'idline' => ['required','regex:/^[a-zA-Z0-9\._@-]+$/u']
        ]);

        $mhs = Auth::user()->mahasiswa;
        Auth::user()->Telepon = $validatedData['nomorhp'];
        Auth::user()->Line = $validatedData['idline'];
        
        $status = "1;Terima kasih, validasi data berhasil!";

        DB::beginTransaction();
        try {
            Auth::user()->save();
            $mhs->ormawas()->attach($validatedData['minat1'], ['prioritas' => 1]);
            $mhs->ormawas()->attach($validatedData['minat2'], ['prioritas' => 0]);
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", null, Auth::id(), null, "Validasi tahap 2 ($mhs->NRP) :".$e->getMessage());
            $status = "0;Vadidasi gagal. Pastikan data yang Anda masukkan benar, atau hubungi Official Account MOB FT apabila masalah berlanjut.";
        }
        DB::commit();

        return redirect()->route('login')->with('message', $status);
    }

    public function create3()
    {
        return view('validasi.tahap3');
    }

    public function pelanggaran()
    {
        return view('validasi.pelanggaran');
    }
    public function presensi()
    {
        return view('validasi.presensi');
    }
    public function barang()
    {
        return view('validasi.barang');
    }

    public function pelanggaranJson()
    {
        return ResourcePelanggaran::collection(Auth::user()->mahasiswa->pelanggarans);
    }
    public function presensiJson()
    {
        return ResourcePresensi::collection(Auth::user()->mahasiswa->presensis);
    }
    public function barangJson()
    {
        return ResourceBarang::collection(Auth::user()->mahasiswa->bawaans);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function check(Request $request)
    {
        $recaptcha = Input::get('g-recaptcha-response');
        // if ($recaptcha == null)
        //     return redirect()->back()->with('message', "0;Untuk memastikan Anda bukan robot, Anda harus klik kotak I'm not a robot!");

        // $client = new Client([
        //     'base_uri' => 'https://google.com/recaptcha/api/'
        //     ]);

        // $response = $client->post(
        //     'https://www.google.com/recaptcha/api/siteverify',
        //     ['form_params'=>
        //         [
        //             'secret'=>env('6LcQ4GYUAAAAAHnY0mNrBsKAMAGu996OhqoY1F2t'),
        //             'response'=>$recaptcha
        //          ]
        //     ]
        // );
        // $body = json_decode((string)$response->getBody());
        // return json_encode($body);

        $pengguna = User::find($request->nrp);
        $password = $request->password;
        $message = "";

        //Check nrp ada atau tidak
        if ($pengguna == null)
            $message = '0;Merasa data Anda seharusnya ada? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya.';
        //Check autentikasi mahasiswa
        else if ($pengguna->NRP != $password)
            $message = '0;Login Gagal. NRP atau password yang Anda masukkan salah.';

        //Check sudah pernah isi validasi atau tidak
        // else if ($pengguna->recups()->get()->count() != 0)
        //     $message = "0;Merasa tidak pernah mengisi data kelengkapan? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya .";
        else if ($pengguna->mahasiswa == null)
            $message = "0;Anda bukan mahasiswa! Pada sistem, anda terdaftar sebagai panitia MOB FT 2018!";
        //Kalau berhasil, masukkan ke Auth
        else
        {
            Auth::loginUsingId($pengguna->NRP);
            return redirect()->route('login')->with('message', '1;Login Berhasil');
        }
        return redirect()->route('login')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return redirect()->back();
    }
}
