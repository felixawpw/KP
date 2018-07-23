<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggaran;
use App\Http\Resources\Pelanggaran as Resource;
use DB;

class PelanggaranController extends Controller
{
    public function json()
    {
        return Resource::collection(Pelanggaran::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pelanggaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategories = \App\Kategori_Pelanggaran::all();
        return view('pelanggaran.create', compact('kategories'));

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
        $kat = $request->kategori;
        $nama = $request->nama;
        $status = DB::update("exec spCreatePelanggaran $kat, '$nama', 0");
        return redirect()->action('PelanggaranController@index');
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
        return view('pelanggaran.show');
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
        $pelanggaran = \App\Pelanggaran::find($id);
        $kategories = \App\Kategori_Pelanggaran::all();
        return view('pelanggaran.edit', compact('kategories', 'pelanggaran'));
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

        $kat = $request->kategori;
        $nama = $request->nama;
        $poin = $request->poin;
        $status = DB::update("exec spUpdatePelanggaran $id, $kat, '$nama', $poin");
        return redirect()->action('PelanggaranController@index')->with($status);
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
        $status = DB::update("exec spDeletePelanggaran $id");
        return redirect()->back()->with($status);
    }
}
