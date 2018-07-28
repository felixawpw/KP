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
        $panitias = \App\User::whereHas('panitia')->orderBy('Nama')->get();
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
        $b = new BarangBawaan;
        $b->Id_Sesi = $request->sesi;
        $b->NRP_Panitia = $request->panitia;
        $b->NRP_Mhs = $request->nrp;
        $b->Id_Barang = $request->barang;
        $status = "1;Tambah barang bawaan berhasil.";

        try
        {
            $b->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Tambah barang bawaan gagal. Pastikan data yang Anda masukkan benar!";
            \App\Log::insertLog("Error", Auth::id(), $nrp, $sesi, "Tambah barang bawaan : ".$e->getMessage());
        }
        return redirect()->action('BarangBawaanController@index')->with('status', $status);
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
        $b = BarangBawaan::where('NRP_Mhs', '=',$nrp)->where('Id_Sesi', '=', $sesi)->where('Id_Barang', '=', $barang)->where('NRP_Panitia', '=', $panitia)->first();
        
        $status = "1;Delete barang bawaan berhasil.";
        try
        {
            $b->delete();
        }
        catch(\Exception $e)
        {            
            $status = "0;Delete barang bawaan gagal. Hubungi ITD!";
            \App\Log::insertLog("Error", $panitia, $nrp, $sesi, "Delete barang bawaan (P:$panitia,M:$nrp)".$e->getMessage());
        }

        return redirect()->back()->with('status', $status);
    }
}
