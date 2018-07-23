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
        //
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
        //
        $tanggal = $request->tanggal;
        $nama = $request->nama_barang;
        $poin = $request->poin;
        $status = DB::update("exec spCreateBarang '$tanggal', '$nama', $poin");
        return redirect()->action('BarangController@index')->with($status);
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
        $tanggal = $request->tanggal;
        $nama = $request->nama_barang;
        $poin = $request->poin;
        $status = DB::update("exec spUpdateBarang $id,'$tanggal', '$nama', $poin");
        return redirect()->action('BarangController@index')->with('status');
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
        $status = DB::update("exec spDeleteBarang $id");
        return redirect()->back();
    }
}
