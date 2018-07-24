<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangBawaan;
use App\Http\Resources\BarangBawaan as Resource;
use DB;


class BarangBawaanController extends Controller
{
    public function editOwn($nrp, $panitia, $sesi)
    {
        $barangs = \App\Barang::orderBy('Nama')->get();
        $p = BarangBawaan::where('NRP_Panitia', '=', $panitia)->
                    where('NRP_Mhs', '=', $nrp)->
                    where('Id_Sesi', '=', $sesi)->first();
        return view('barangbawaan.edit', compact('barangs', 'p'));

    }

    public function json()
    {
        return Resource::collection(BarangBawaan::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('barangbawaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = \App\Barang::all();
        $sesis = \App\Sesi::orderBy('Nama')->get();
        $panitias = \App\Panitia::orderBy('Nama')->get();
        return view('barangbawaan.create', compact('barangs', 'sesis', 'panitias'));
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
        $sesi = $request->sesi;
        $panitia = $request->panitia;
        $nrp = $request->nrp;
        $barang = $request->barang;
        $status = DB::update("exec sp_BarangBawaan $sesi, $panitia, $nrp, $barang");

        return redirect()->action('BarangBawaanController@index');
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
        $barangs = \App\Barang::orderBy('Nama')->get();
        $sesis = \App\Sesi::orderBy('Nama')->get();
        return view('barangbawaan.edit', compact('barangs', 'sesis'));
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
        return redirect()->action('BarangBawaanController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nrp, $panitia, $sesi, $barang)
    {
        $status = DB::update("exec sp_BarangBawaanHapus $sesi, $panitia, $nrp, $barang");
        return redirect()->back();
    }
}
