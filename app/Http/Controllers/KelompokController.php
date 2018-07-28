<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelompok, DB;
use App\Http\Resources\Kelompok as Resource;

class KelompokController extends Controller
{
    public function json()
    {
        return Resource::collection(Kelompok::orderBy('Kelompok')->get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kelompok.index');
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
        return view('kelompok.create', compact('panitias'));
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
        $kelompok = new Kelompok;
        $kelompok->Kelompok = $request->kelompok;
        $kelompok->NRP = $request->maping;

        $status = "1;Tambah Kelompok berhasil.";
        try
        {
            $kelompok->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Tambah Kelompok gagal. Pastikan data yang anda masukkan benar!";
            \App\Log::insertLog("Error", Auth::id(), null, null, $e->getMessage());
        }
        return redirect()->action('KelompokController@index')->with('status', $status);
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
        $kelompok = Kelompok::where('Kelompok', '=', $id)->first();
        $panitias = \App\User::whereHas('panitia')->orderBy('Nama')->get();

        return view('kelompok.edit', compact('kelompok', 'panitias'));
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
        $kelompok = Kelompok::where('Kelompok', '=', $id)->first();
        $kelompok->NRP = $request->maping;

        $status = "1;Edit Kelompok berhasil.";
        try
        {
            $kelompok->save();
        }
        catch(\Exception $e)
        {            
            $status = "0;Edit Kelompok gagal. Pastikan data yang anda masukkan benar!";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Edit Panitia_Maping ($id): ".$e->getMessage());
        }

        return redirect()->action('KelompokController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelompok)
    {
        $kelompok = Kelompok::where('Kelompok', '=', $kelompok)->first();
        $status = "1;Delete Kelompok berhasil.";

        try
        {
            $kelompok->delete();
        }
        catch(\Exception $e)
        {            
            $status = "0;Delete Kelompok gagal. Kontak ITD!";
            \App\Log::insertLog("Error", Auth::id(), null, null, "Delete Panitia_Maping ($kelompok): ".$e->getMessage());
        }
        //$status = DB::update("exec sp_DeleteKelompok $kelompok"); //Uncomment
        return redirect()->back();
    }
}
