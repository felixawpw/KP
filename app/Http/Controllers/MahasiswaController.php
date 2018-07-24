<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Http\Resources\Mahasiswa as Resource;
use DB;

class MahasiswaController extends Controller
{
    public function json()
    {
        return Resource::collection(Mahasiswa::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mahasiswas = Resource::collection(Mahasiswa::all());
        return view('mahasiswa.index', compact('mahasiswas'));
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
        $nrp = $request->nrp;
        $nama = $request->nama_lengkap;
        $jurusan = $request->jurusan;
        $angkatan = $request->angkatan;
        $alfa = $request->kelompok_alfa;
        $beta = $request->kelompok_beta;
        $status = DB::update("exec spCreateMahasiswa '$nrp', null,'$nama', $jurusan, $angkatan, 0, 0, null"); //Buat SPnya
        return redirect()->action('MahasiswaController@index');
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
        $mahasiswa = new Resource(Mahasiswa::find($id));
        return view('mahasiswa.edit', compact('jurusans', 'mahasiswa'));
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
        $nama = $request->nama;
        $jurusan = $request->jurusan;
        $angkatan = $request->angkatan;
        $alfa = $request->kelompok_alfa;
        $beta = $request->kelompok_beta;
        $status = DB::update("exec spUpdateMahasiswa '$id', null,'$nama', $jurusan, $angkatan, 0, 0, null"); //Buat SPnya
        return redirect()->action('MahasiswaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = DB::update("exec spDeleteMahasiswa $id");
        return redirect()->back()->with($status);
    }
}
