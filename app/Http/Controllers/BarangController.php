<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang, DB;
use App\Http\Resources\Barang as Resource;

class BarangController extends Controller
{

    public function json()
    {
        return Resource::collection(Barang::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->Tanggal = $request->tanggal;
        $barang->Nama = $request->nama_barang;
        $barang->Poin = $request->poin;

        $status = "1;Tambah barang berhasil.";
        try
        {
            $barang->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Tambah barang gagal. Pastikan data yang anda masukkan benar!";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Edit Panitia_Maping ($id): ".$e->getMessage());
        }

        return redirect()->action('BarangController@index')->with('status', $status);
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
        $barang = Barang::getById($id);
        return $barang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang'));
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
        $barang = Barang::find($id);
        $barang->Tanggal = $request->tanggal;
        $barang->Nama = $request->nama_barang;
        $barang->Poin = $request->poin;

        $status = "1;Edit barang berhasil.";
        try
        {
            $barang->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Edit barang gagal. Pastikan data yang anda masukkan benar!";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Edit Barang ($id): ".$e->getMessage());
        }
        return redirect()->action('BarangController@index')->with('status',$status);
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
        $barang = Barang::find($id);

        $status = "1;Delete barang berhasil.";
        try
        {
            $barang->delete();
        }
        catch(\Exception $e)
        {            
            $status = "0;Delete barang gagal. Kontak ITD!";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Delete Barang ($id): ".$e->getMessage());
        }

        return redirect()->back()->with('status', $status);
    }
}
