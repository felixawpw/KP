<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Recup;
use App\Http\Resources\PesertaRecup as Resource;
use Auth;
class RecupController extends Controller
{

    public function json()
    {
        return Recup::all();
    }

    public function jsonPeserta($id)
    {
        return Resource::collection(Recup::find($id)->mahasiswas);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('recup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('recup.create');
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
        $recup = new Recup;
        $recup->Nama = $request->nama;
        $recup->Deskripsi = $request->deskripsi;
        $recup->save();

        return redirect()->route('recup.index')->with('status', '1;Tambah recup berhasil!');
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
        $recup = Recup::find($id);
        return view('recup.show', compact('recup'));
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
        $recup = Recup::find($id);
        return view('recup.edit', compact('recup'));
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

        $recup = Recup::find($id);
        $recup->Nama = $request->nama;
        $recup->Deskripsi = $request->deskripsi;
        $recup->save();

        return redirect()->route('recup.index')->with('status', '1;Edit recup berhasil!');
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
        $recup = Recup::find($id);
        $status = "1;Delete recup berhasil!";
        try 
        {
            $recup->delete();
        } 
        catch(\Exception $e)
        {
            \App\Log::insertLog("Error", Auth::id(), null, null, "Delete Recup ($id): ".$e->getMessage());
            $status = "0;Delete mahasiswa gagal. Contact ITD untuk mendelete Recup.";
        }
        return redirect()->route('recup.index')->with('status', $status);
    }
}
