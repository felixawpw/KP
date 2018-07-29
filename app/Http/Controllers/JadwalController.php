<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi, DB;
use App\Http\Resources\Sesi as Resource;
use Auth;

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
        $s = new Sesi;

        $s->Nama = $request->nama;
        $s->Mulai = $request->mulai;
        $s->Akhir = $request->akhir;
        $s->Kelompok = $request->kelompok;

        return $s->Mulai;
        $status = "1;Tambah sesi berhasil.";
        try
        {
            $s->save();        
        }
        catch(\Exception $e)
        {            
            $status = "0;Tambah sesi gagal.";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Tambah Sesi: ".$e->getMessage());
        }

        return redirect()->action('JadwalController@index')->with('status', $status);
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
        $s = Sesi::find($id);
        $m = explode('T', $request->mulai);
        $a = explode('T', $request->akhir);

        $s->Nama = $request->nama;
        $s->Mulai = "$m[0] $m[1]";
        $s->Akhir = "$a[0] $a[1]";
        $s->Kelompok = $request->kelompok;
        $status = "1;Edit sesi berhasil.";
        try
        {
            $s->save();        
        }
        catch(\Exception $e)
        {            
            return $e;
            $status = "0;Edit sesi gagal.";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Edit Sesi ($id): ".$e->getMessage());
        }
        //$status = DB::update("sp_UpdateSesi $id, $nama, $mulai, $akhir, $kelompok"); //Uncomment
        return redirect()->action('JadwalController@index')->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Sesi::find($id);

        $status = "1;Delete sesi berhasil.";
        try
        {
            $s->delete();        
        }
        catch(\Exception $e)
        {            
            $status = "0;Delete sesi gagal.";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Delete Sesi ($id): ".$e->getMessage());
        }
        return redirect()->back()->with('status', $status);
    }
}
