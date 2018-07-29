<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggar;
use App\Http\Resources\Pelanggar as Resource;
use DB;
use Auth;

class PelanggarController extends Controller
{
    public function editOwn($nrp, $panitia, $sesi, $pelanggaran)
    {
        $pelanggarans = \App\Pelanggaran::orderBy('Nama')->get();
        $p = new Resource(Pelanggar::where('NRP_Panitia', '=', $panitia)->
                    where('NRP_Mhs', '=', $nrp)->
                    where('Id_Sesi', '=', $sesi)->
                    where('Id_Pelanggaran', '=', $pelanggaran)->first());
        $p = $p->toArray($this);
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
        $panitias = \App\User::whereHas('panitia')->orderBy('Nama')->get();
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
        $p = new Pelanggar;
        $p->Id_Sesi = $request->sesi;
        $p->NRP_Panitia = $request->panitia;
        $p->NRP_Mhs = $request->nrp;
        $p->Id_Pelanggaran = $request->pelanggaran;
        $p->Waktu = \Carbon\Carbon::now();
        $p->save();
        
        $status = "1;Tambah Pelanggar berhasil.";
        try
        {
            $p->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Tambah Pelanggar gagal. Hubungi ITD.";
            \App\Log::insertLog("Error", Auth::id(), $nrp, $sesi, "Tambah Pelanggar (P:$p->NRP_Panitia, M:$p->NRP_Mhs) :".$e->getMessage());
        }

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
    public function update(Request $request, $nrp, $panitia, $sesi, $pelanggaran)
    {
        //
        $p = Pelanggar::where('NRP_Mhs', '=', $nrp)->
                where('NRP_Panitia', '=', $panitia)->
                where('Id_Sesi', '=', $sesi)->
                where('Id_Pelanggaran', '=', $pelanggaran)->first();
        $p->id_P = $pelanggaran;
        $p->Id_Pelanggaran = $request->pelanggaran;
        $status = "1;Edit Pelanggar berhasil.";
        try
        {
            $p->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Edit Pelanggar gagal. Hubungi ITD.";
            \App\Log::insertLog("Error", Auth::id(), $nrp, $sesi, "Edit Pelanggar (P:$panitia, M:$nrp) :".$e->getMessage());
        }

        return redirect()->action('PelanggarController@index')->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nrp, $panitia, $sesi, $pelanggaran)
    {
        //
        $p = Pelanggar::where('NRP_Mhs', '=', $nrp)->
            where('NRP_Panitia', '=', $panitia)->
            where('Id_Sesi', '=', $sesi)->
            where('Id_Pelanggaran', '=', $pelanggaran)->first();
        $p->id_P = $p->Id_Pelanggaran;

        $status = "1;Delete Pelanggar berhasil.";
        try
        {
            $p->delete();
        }
        catch(\Exception $e)
        {            
            $status = "0;Delete Pelanggar gagal. Hubungi ITD.";
            \App\Log::insertLog("Error", Auth::id(), $nrp, $sesi, "Delete Pelanggar (P:$panitia, M:$nrp) :".$e->getMessage());
        }
        return redirect()->back()->with('status',$status);
    }
}
