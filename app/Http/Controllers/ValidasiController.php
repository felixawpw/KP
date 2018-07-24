<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('validasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Read Auth
        $mhs = \App\Mahasiswa::find("160415052");
        return view('validasi.create', compact('mhs'));
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
        return redirect()->action('ValidasiController@index');
    }

    public function check(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->nrp);
        $password = $request->password;
        $message = "";
        //Check nrp ada atau tidak
        if ($mahasiswa == null)
            $message = 'BEWARE;Merasa data Anda seharusnya ada? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya.';
        
        //Check autentikasi mahasiswa
        else if ($mahasiswa->NRP != $password)
            $message = 'Login Gagal. NRP atau password yang Anda masukkan salah.';

        //Check sudah pernah isi validasi atau tidak
        else if ($mahasiswa->Penyakit != null)
            $message = "WARNING;Merasa tidak pernah mengisi data kelengkapan? Segera kontak OFFICIAL ACCOUNT Masa Orientasi Bersama Fakultas Teknik 2017 melalui sosial media yang ada dengan memberitahukan bahwa Anda tidak dapat mengisi data kelengkapan MOB FT 2017 dengan mencantumkan: NAMA LENGKAP, NRP, JURUSAN. Kami juga merekomendasikan Anda melakukan screenshot sebagai lampiran. Informasi mengenai Official Account dapat dilihat pada Website MOB Ubaya .";
        
        //Kalau berhasil, masukkan ke Auth
        else
            return redirect()->route('validasi.create')->with('');

        return redirect()->route('validasi.index')->with('message', 'Data NRP tidak ada');
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
        return redirect()->action('ValidasiController@index');
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
