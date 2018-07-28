<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\Mahasiswa as Resource;
use DB;

class MahasiswaController extends Controller
{
    public function json()
    {
        return Resource::collection(User::whereHas('mahasiswa')->get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jurusans = \App\Jurusan::all();
        return view('mahasiswa.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->NRP = $request->nrp;
        $user->Nama = $request->nama_lengkap;
        $user->Id_Jurusan = $request->jurusan;
        $user->Angkatan = $request->angkatan;
        $user->NRP = $request->nrp;

        $mahasiswa = new \App\Mahasiswa();
        $mahasiswa->NRP_Pengguna = $user->NRP;

        $alfa = $request->kelompok_alfa;
        $beta = $request->kelompok_beta;

        $mAlfa = new \App\Mhs_Maping;
        $mAlfa->NRP_Mhs = $request->nrp;
        $mAlfa->Kelompok = $request->kelompok_alfa;

        $mBeta = new \App\Mhs_Maping;        
        $mBeta->NRP_Mhs = $request->nrp;
        $mBeta->Kelompok = $request->kelompok_beta;

        $status = "1;Tambah mahasiswa berhasil!";
        DB::beginTransaction();
        try {
            $user->save();
            $mahasiswa->save();
            $mAlfa->save();
            $mBeta->save();
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", Auth::id(), null, null, "Tambah Mahasiswa :".$e->getMessage());
            $status = "0;Tambah mahasiswa gagal. Pastikan data yang Anda masukkan benar.";
        }
        DB::commit();

        return redirect()->route('mahasiswa.index')->with('status', $status);
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
        $mahasiswa = new Resource(Mahasiswa::find($id));
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusans = \App\Jurusan::all();
        $mahasiswa = new Resource(User::find($id));
        $mahasiswa = $mahasiswa->toArray($this);
        $recups = \App\Recup::orderBy('Nama')->get();

        return view('mahasiswa.edit', compact('jurusans', 'mahasiswa', 'recups'));
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

        $nama = $request->nama;
        $jurusan = $request->jurusan;
        $angkatan = $request->angkatan;
        $alfa = $request->kelompok_alfa;
        $beta = $request->kelompok_beta;

        $user->Nama = $nama;
        $user->Id_Jurusan = $jurusan;
        $user->Angkatan = $angkatan;
        $user->Penyakit = $request->penyakit == "" ? null : $request->penyakit;

        $res = new Resource(User::find($id));
        $res = $res->toArray($this);

        // $mAlfa = $user->mahasiswa->kelompoks()->where('Kelompok','=', $res['alfa'])->first();
        // $mBeta = $user->mahasiswa->kelompoks()->where('Kelompok','=', $res['beta'])->first();
        // $mAlfa->Kelompok = $alfa;
        // $mBeta->Kelompok = $beta;
        $status = "1;Edit mahasiswa berhasil!";
        DB::beginTransaction();
        try {
            $user->save();

            // $mAlfa->save();
            // $mBeta->save();
        } catch (\Exception $e) {
            $status = "0;Edit mahasiswa gagal. Pastikan data yang Anda masukkan benar.";
            DB::rollback();
            \App\Log::insertLog("Error", Auth::id(), $user->NRP, null, "Update Mahasiswa ($user->NRP): ".$e->getMessage());
        }
        DB::commit();

        return redirect()->action('MahasiswaController@index')->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = "1;Delete mahasiswa berhasil!";
        $user = User::find($id);
        DB::beginTransaction();
        try {
            $user->mahasiswa->kelompoks()->delete();
            $user->mahasiswa->delete();
            $user->delete();
        } catch (\Exception $e) {
            DB::rollback();
            \App\Log::insertLog("Error", Auth::id(), null, null, "Delete Mahasiswa ($user->NRP): ".$e->getMessage());
            $status = "0;Delete mahasiswa gagal. Contact ITD untuk mendelete mahasiswa dengan NRP $user->NRP.";
        }

        DB::commit();
        return redirect()->back()->with('status', $status);
    }
}
