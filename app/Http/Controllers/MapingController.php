<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maping, DB;
use App\Http\Resources\Maping as Resource;
use Auth;

class MapingController extends Controller
{
    public function json()
    {
        return Resource::collection(\App\Panitia::has('kelompok')->get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('maping.index');
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
        return view('maping.create', compact('jurusans'));
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
        $nama = $request->nama;
        $jurusan = $request->jurusan;
        $angkatan = $request->angkatan;
        $alfa = $request->kelompok_alfa;
        $beta = $request->kelompok_beta;
        $status = DB::update("exec spCreateMaping $nrp, $nama, $jurusan, $angkatan, $alfa, $beta"); //Buat SPnya

        return redirect()->action('MapingController@index');
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
        $jurusans = \App\Jurusan::all();
        return view('maping.edit', compact('jurusans'));
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
        return redirect()->action('MapingController@index');
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
