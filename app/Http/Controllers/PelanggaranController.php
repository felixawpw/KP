<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggaran;
use App\Http\Resources\Pelanggaran as Resource;
use DB;
use Auth;

class PelanggaranController extends Controller
{
    public function json()
    {
        return Resource::collection(Pelanggaran::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pelanggaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategories = \App\Kategori_Pelanggaran::all();
        return view('pelanggaran.create', compact('kategories'));

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
        $p = new Pelanggaran;
        $kat = $request->kategori;
        $nama = $request->nama;
        $timpa = $request->poin_timpa;

        $p->Id_Kategori = $kat;
        $p->Nama = $nama;
        $p->Poin_Timpa = $timpa;
        $status = "1;Tambah Pelanggaran berhasil.";
        try
        {
            $p->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Tambah Pelanggaran gagal. Pastikan data yang anda masukkan benar!";
            \App\Log::insertLog("Error", Auth::id(), null, null, $e->getMessage());
        }
        return redirect()->route('pelanggaran.index')->with('status', $status);
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
        return view('pelanggaran.show');
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
        $pelanggaran = \App\Pelanggaran::find($id);
        $kategories = \App\Kategori_Pelanggaran::all();
        return view('pelanggaran.edit', compact('kategories', 'pelanggaran'));
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
        $p = Pelanggaran::find($id);
        $kat = $request->kategori;
        $nama = $request->nama;
        $timpa = $request->poin;

        $p->Id_Kategori = $kat;
        $p->Nama = $nama;
        $p->Poin_Timpa = $timpa;
        $status = "1;Edit Pelanggaran berhasil.";
        try
        {
            $p->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Edit Pelanggaran gagal. Pastikan data yang anda masukkan benar!";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Edit Pelanggaran ($id) :".$e->getMessage());
        }
        return redirect()->action('PelanggaranController@index')->with('status',$status);
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

        $p = Pelanggaran::find($id);
        $status = "1;Delete Pelanggaran berhasil.";
        try
        {
            $p->delete();
        }
        catch(\Exception $e)
        {            
            $status = "0;Delete Pelanggaran gagal. Hubungi ITD.";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Delete Pelanggaran ($id) :".$e->getMessage());
        }
        return redirect()->back()->with('status',$status);
    }
}
