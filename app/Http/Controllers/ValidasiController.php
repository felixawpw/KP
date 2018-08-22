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
use Adldap\Laravel\Facades\Adldap;
class ValidasiController extends Controller
{
    public function showLogin()
    {
        $uls = \App\Uls::all();
        return view('validasi.index', compact('uls'));
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
            $message = '0;Validasi Sudah Tercatat!;Anda tercatat sudah pernah mengisi form validasi rektor cup. Apabila anda belum pernah mengisi form validasi, hubungi Official Account MOB FT 2019 dengan contoh format :<p class="justify"><br>NRP : 160415052<br>Nama : Felix Aditya Wijaya<br>Alasan : Tidak dapat akses validasi rektor cup karena tercatat sudah pernah mengisi form.</p>';
            return redirect()->route('login')->with('status', $message);
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
        if ($request->minat1 == $request->minat2)
            return redirect()->back()->with('message', '0;Validasi gagal;Pilihan minat 1 dan 2 tidak boleh sama!');

        $pengguna = User::find(Auth::id());
        $pengguna->Penyakit = $request->penyakit == "Y" ? $request->penyakit_detail : null;
        
        $link = null;
        if ($request->prestasi != null)
        {            
            $custom_file_name = Auth::id().".".\File::extension($request->file('prestasi')->getClientOriginalName());
            $link = $request->file('prestasi')->storeAs('bukti',$custom_file_name);
        }

        DB::beginTransaction();
        try {
            $pengguna->recups()->attach($request->minat1, ['Prioritas'=>1, 'Bukti'=> $link != null ? (isset(explode('/',$link)[1]) ? explode('/',$link)[1] : null ) : null, 'Diterima'=>null]);
            $pengguna->recups()->attach($request->minat2, ['Prioritas'=>2, 'Bukti'=>null, 'Diterima'=>null]);
            $pengguna->save();
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", null, Auth::id(), null, "Validasi tahap 1 ($mhs->NRP) :".$e->getMessage());
            $status = "0;Vadidasi gagal;Pastikan data yang Anda masukkan benar, atau hubungi Official Account MOB FT apabila masalah berlanjut.";
        }
        DB::commit();

        $n1 = \App\Recup::find($request->minat1)->Nama;
        $n2 = \App\Recup::find($request->minat2)->Nama;
        return redirect()->route('login')->with('message', "1;Validasi data berhasil!;<br>Data yang Anda masukkan adalah sebagai berikut:<br><br>Penyakit : $pengguna->Penyakit <br>Pilihan 1 : $n1<br>Pilihan 2 : $n2");
    }

    public function create2()
    {
        $pengguna = Auth::user()->mahasiswa;
        if ($pengguna->ormawas()->get()->count() != 0)
        {
            $message = '0;Validasi Sudah Tercatat!;Anda tercatat sudah pernah mengisi form validasi OHO. Apabila anda belum pernah mengisi form validasi, hubungi Official Account MOB FT 2019 dengan contoh format :<p class="justify"><br>NRP : 160415052<br>Nama : Felix Aditya Wijaya<br>Alasan : Tidak dapat akses validasi OHO karena tercatat sudah pernah mengisi form.</p>';
            return redirect()->route('login')->with('status', $message);
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
            'idline' => ['required','regex:/^[a-zA-Z0-9\._@-]+$/u', 'min:4', 'max:20']
        ]);

        $mhs = Auth::user()->mahasiswa;
        Auth::user()->Telepon = $validatedData['nomorhp'];
        Auth::user()->Line = $validatedData['idline'];
        
        $status = "1;Validasi data berhasil!;<br>Data yang Anda masukkan adalah sebagai berikut:<br><br>Ormawa 1 : ".\App\Ormawa::find($validatedData['minat1'])->Nama."<br>Ormawa 2 : ".\App\Ormawa::find($validatedData['minat2'])->Nama."<br>Nomor Telepon : ".$validatedData['nomorhp']."<br>ID Line : ".$validatedData['idline'];

        DB::beginTransaction();
        try {
            Auth::user()->save();
            $mhs->ormawas()->attach($validatedData['minat1'], ['prioritas' => 1]);
            $mhs->ormawas()->attach($validatedData['minat2'], ['prioritas' => 2]);
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", null, Auth::id(), null, "Validasi tahap 2 ($mhs->NRP) :".$e->getMessage());
            $status = "0;Vadidasi gagal;Pastikan data yang Anda masukkan benar, atau hubungi Official Account MOB FT apabila masalah berlanjut.";
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
        // if ($recaptcha == null)
        //     return redirect()->back()->with('message', "0;Untuk memastikan Anda bukan robot, Anda harus klik kotak I'm not a robot!");
        
        // $recaptcha = Input::get('g-recaptcha-response');
        // $client = new Client([
        //     'base_uri' => 'https://google.com/recaptcha/api/'
        //     ]);

        // $response = $client->post(
        //     'https://www.google.com/recaptcha/api/siteverify',
        //     ['form_params'=>
        //         [
        //             'secret'=>'6Lf_CmgUAAAAAGBDLzCl8x3N_zx4js6jZjQMqSU1',
        //             'response'=>$recaptcha
        //         ]
        //     ]
        // );
        // $body = json_decode((string)$response->getBody());
        
        // if (!$body->success)
        //     return redirect()->route('login')->with('message', "0;Captcha Error. Pastikan anda sudah mengisi captcha.");

        $bindAsUser = true;        
        

        $username = $request->nrp;
        $password = $request->password;

        $pengguna = User::find(substr($request->nrp, 1));
        $message = "1;Selamat datang!";

        //Check nrp ada atau tidak
        if ($request->nrp[0] != 's')
            $message = "0;Invalid Credential;Pastikan anda login menggunakan format sNRP (s kecil diikuti NRP).";
        else if ($pengguna == null || $pengguna == "")
        {
            $message = '0;Invalid Credential;Anda belum terdaftar pada sistem';
            \App\Log::insertLog("Error", null, null, null, "[Laravel Login] NRP not registered for ".$request->nrp);
        }
        //Check autentikasi mahasiswa
        // else if (!Adldap::auth()->attempt($request->nrp, $password, $bindAsUser))
        // {
        //     $message = "0;Login gagal. Password salah.";
        //     \App\Log::insertLog("Warning", null, null, null, "[Laravel Login] Invalid credential for ".$request->nrp);
        // }
        else if ($pengguna->mahasiswa == null)
        { 
            $message = "0;Invalid Credential;Anda belum terdaftar pada sistem";
            \App\Log::insertLog("Error", null, null, null, "[Laravel Login] Invalid group for ".$request->nrp);
        }
        //Kalau berhasil, masukkan ke Auth
        else
        {
            Auth::loginUsingId($pengguna->NRP);
            \App\Log::insertLog("Info", null, null, null, "[Laravel Login] Valid credential for ".substr($request->nrp, 1));
            return redirect()->route('login')->with('status', '1;Login Berhasil; Selamat datang di website MOB Fakultas Teknik Universitas Surabaya!');
        }
        return redirect()->route('login')->with('status', $message);
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
