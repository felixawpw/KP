<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggar;
use App\Http\Resources\Pelanggar as Resource;
use DB;

class PelanggarController extends Controller
{
    public function editOwn($nrp, $panitia, $sesi)
    {
        $pelanggarans = \App\Pelanggaran::orderBy('Nama')->get();
        $p = Pelanggar::where('NRP_Panitia', '=', $panitia)->
                    where('NRP_Mhs', '=', $nrp)->
                    where('Id_Sesi', '=', $sesi)->first();
        return view('pelanggar.edit', compact('pelanggarans', 'p'));
    }

    public function json()
    {
        return Resource::collection(Pelanggar::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pelanggar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pelanggarans = \App\Pelanggaran::orderBy('Nama')->get();
        $panitias = \App\Panitia::orderBy('Nama')->get();
        $sesis = \App\Sesi::orderBy('Nama')->get();
        return view('pelanggar.create', compact('pelanggarans', 'panitias', 'sesis'));
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
        $pelanggaran = $request->pelanggaran;
        $status = DB::update("exec sp_Pelanggaran $sesi, $panitia, $nrp, $pelanggaran");
        return redirect()->action('PelanggarController@index');
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
        return view('pelanggar.show');

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
        $nrp = $request->nrp;
        $panitia = $request->panitia;
        $sesi = $request->waktu;
        $pelanggaran = $request->pelanggaran;
        $status = DB::update("exec sp_UpdatePelanggaran $sesi, $panitia, $nrp, $pelanggaran");
        return redirect()->action('PelanggarController@index')->with('status');
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
        $status = DB::update("exec sp_DeletePelanggaran $sesi, $panitia, $nrp");
        return redirect()->back()->with($status);
    }
}
