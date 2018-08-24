<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presensi, DB;
use App\Http\Resources\Presensi as Resource;
use Auth;

class PresensiController extends Controller
{
    public function json()
    {
        if(Auth::user()->panitia->Id_Divisi == 10)
            $presensi = Presensi::where('NRP_Panitia', '=', Auth::id())->get();
        else
            $presensi = Presensi::all();
        return Resource::collection($presensi);
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
        $panitias = \App\User::whereHas('panitia')->orderBy('Nama')->get();
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
        $p = new Presensi;
        $p->Id_sesi = $request->sesi;
        $p->NRP_Panitia = $request->panitia;
        $p->NRP_Mhs = $request->nrp;

        $status = "1;Tambah presensi berhasil.";
        try
        {
            $p->save();        
        }
        catch(\Exception $e)
        {            
            $status = "0;Tambah presensi gagal. Mahasiswa sudah tercatat presensinya pada sesi tersebut.";
            \App\Log::insertLog("Error", Auth::id(), $p->NRP_Mhs, $p->Id_Sesi, "Tambah Mhs_Presensi : ".$e->getMessage());
        }

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
        $presensi = Presensi::where("Id_Sesi",'=', $sesi)->where('NRP_Mhs', '=',$nrp)->first();
        $status = "1;Hapus presensi berhasil.";
        try
        {
            $presensi->delete();        
        }
        catch(\Exception $e)
        {            
            $status = "0;Hapus presensi gagal.";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Hapus Mhs_Presensi ($nrp, $sesi): ".$e->getMessage());
        }
        return redirect()->back()->with($status);
    }
}
