<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa, App\Pengguna;
use Illuminate\Support\Facades\Auth;
use App\User, Storage;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Read Auth
        $recups = \App\Recup::orderBy('Nama')->get();
        $kelompoks = Auth::user()->mahasiswa->kelompoks()->orderBy('Kelompok')->get();

        $a = isset($kelompoks[0])?$kelompoks[0]->Kelompok:'-';
        $b = isset($kelompoks[1])?$kelompoks[1]->Kelompok:'-';
        return view('validasi.create', compact('a', 'b', 'recups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'penyakit' => 'required',
            'minat1' => 'required',
            'minat2' => 'required',
            'penyangkalan' => 'required',
        ]);

        $pengguna = User::find(Auth::id());
        $pengguna->Penyakit = $request->penyakit == "Y" ? $request->penyakit_detail : "";
        
        $link = "";
        if ($request->prestasi != null)
            $link = Storage::put("bukti", $request->prestasi);

        $pengguna->recups()->attach($request->minat1, ['Prioritas'=>"True", 'Bukti'=>$link, 'Diterima'=>"False"]);
        $pengguna->recups()->attach($request->minat2, ['Prioritas'=>"False", 'Bukti'=>"", 'Diterima'=>"False"]);
        $pengguna->save();

        Auth::logout();

        $n1 = \App\Recup::find($request->minat1)->Nama;
        $n2 = \App\Recup::find($request->minat2)->Nama;
        return redirect()->route('login')->with('message', "1;Validasi data berhasil!<br>Data yang ada masukkan adalah sebagai berikut:<br><br>Penyakit : $pengguna->Penyakit <br>Pilihan 1 : $n1<br>Pilihan 2 : $n2<br><br>Apabila terdapat kesalahan pada pengisian data, kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2018 melalui sosial media yang ada.");
    }

    public function check(Request $request)
    {
        $pengguna = Pengguna::find($request->nrp);
        $password = $request->password;
        $message = "";

        //Check nrp ada atau tidak
        if ($pengguna == null)
            $message = '0;Merasa data Anda seharusnya ada? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya.';
        //Check autentikasi mahasiswa
        else if ($pengguna->NRP != $password)
            $message = '0;Login Gagal. NRP atau password yang Anda masukkan salah.';

        //Check sudah pernah isi validasi atau tidak
        else if ($pengguna->Penyakit != null)
            $message = "0;Merasa tidak pernah mengisi data kelengkapan? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya .";
        else if ($pengguna->mahasiswa == null)
            $message = "0;Anda bukan mahasiswa! Pada sistem, anda terdaftar sebagai panitia MOB FT 2018!";
        //Kalau berhasil, masukkan ke Auth
        else
        {
            Auth::loginUsingId($pengguna->NRP);
            return redirect()->route('validasi.create')->with('message', '1;Login Berhasil');
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
