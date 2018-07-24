<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presensi, DB;
use App\Http\Resources\Presensi as Resource;

class PresensiController extends Controller
{
    public function json()
    {
        return Resource::collection(Presensi::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sesis = \App\Sesi::all();
        return view('presensi.index', compact('sesis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $panitias = \App\Panitia::orderBy('Nama')->get();
        $sesis = \App\Sesi::orderBy('Mulai')->get();
        return view('presensi.create', compact('panitias', 'sesis'));
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
        $status = DB::update("exec sp_Presensi $sesi, $panitia, $nrp");
        return redirect()->action('PresensiController@index')->with($status);
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
        return view('presensi.show');

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
        return view('presensi.edit');

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
        return redirect()->action('PresensiController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nrp, $sesi)
    {
        //
        $status = DB::update("exec sp_DeletePresensi $nrp, $sesi"); //uncomment
        return redirect()->back()->with($status);
    }
}
