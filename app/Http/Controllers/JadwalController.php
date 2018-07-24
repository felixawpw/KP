<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi, DB;
use App\Http\Resources\Sesi as Resource;

class JadwalController extends Controller
{
    public function json()
    {
        return Resource::collection(Sesi::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('jadwal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jadwal.create');
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
        $nama = $request->nama;
        $mulai = $request->mulai;
        $akhir = $request->akhir;
        $kelompok = $request->kelompok;

        //$status = DB::update("sp_InsertSesi $nama, $mulai, $akhir, $kelompok"); //Uncomment
        return redirect()->action('JadwalController@index')->with('status');
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
        $sesi = Sesi::find($id);
        return view('jadwal.edit', compact('sesi'));
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
        $nama = $request->nama;
        $mulai = $request->mulai;
        $akhir = $request->akhir;
        $kelompok = $request->kelompok;
        //$status = DB::update("sp_UpdateSesi $id, $nama, $mulai, $akhir, $kelompok"); //Uncomment
        return redirect()->action('JadwalController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$status = DB::update("sp_DeleteSesi $id"); //Uncomment
        return redirect()->back();
    }
}
