<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\Panitia as Resource;
use DB;
use Auth;


class PanitiaController extends Controller
{

    public function json()
    {
        return Resource::collection(User::whereHas('panitia')->get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('panitia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $divisis = \App\Divisi::all();
        $jurusans = \App\Jurusan::all();
        return view('panitia.create', compact('divisis', 'jurusans'));

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
        $user = new User;        
        $nrp = $request->nrp;
        $nama = $request->nama_lengkap;
        $jurusan = $request->jurusan;
        $divisi = $request->divisi;

        $user->NRP = $nrp;
        $user->Nama = $nama;
        $user->Id_Jurusan = $jurusan;

        $panitia = new \App\Panitia;
        $panitia->NRP_Pengguna = $user->NRP;
        $panitia->Tahun = 2018;
        $panitia->Id_Divisi = $divisi;
        $status = "1;Tambah panitia berhasil.";

        DB::beginTransaction();
        try {
            $user->save();
            $panitia->save();
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", Auth::id(), null, null, "EdiTambah panitia ($user->NRP) :".$e->getMessage());
            $status = "0;Tambah panitia gagal. Pastikan data yang Anda masukkan benar.";
        }
        DB::commit();
        $password = "";
        return redirect()->action('PanitiaController@index')->with('status', $status);
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
        return view('panitia.show');

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
        $divisis = \App\Divisi::all();
        $jurusans = \App\Jurusan::all();
        $panitia = \App\User::find($id);
        return view('panitia.edit', compact('divisis', 'jurusans', 'panitia'));

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
        $user = User::find($id);
        $nama = $request->nama_lengkap;
        $jurusan = $request->jurusan;
        $divisi = $request->divisi;

        $user->Nama = $nama;
        $user->Id_Jurusan = $jurusan;
        $user->panitia->Id_Divisi = $divisi;
        
        $status = "1;Edit panitia berhasil!";
        DB::beginTransaction();
        try {
            $user->panitia->save();
            $user->save();
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", Auth::id(), null, null, "Edit pantia ($id) :".$e->getMessage());
            $status = "0;Edit panitia gagal. Pastikan data yang Anda masukkan benar.";
        }
        DB::commit();



        return redirect()->action('PanitiaController@index')->with('status', $status);
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
        $status = "1;Delete panitia berhasil!";

        $user = User::find($id);
        DB::beginTransaction();
        try {
            $user->panitia->delete();
            $user->delete();
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", Auth::id(), null, null, "Delete pantia ($id) :".$e->getMessage());
            $status = "0;Delete panitia gagal. Kontak ITD untuk menghapus panitia dengan NRP $id.";
        }
        DB::commit();
        return redirect()->back()->with('status', $status);
    }
}
