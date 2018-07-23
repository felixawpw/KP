<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panitia;
use App\Http\Resources\Panitia as Resource;
use DB;


class PanitiaController extends Controller
{

    public function json()
    {
        return Resource::collection(Panitia::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('panitia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $divisis = \App\Divisi::all();
        $jurusans = \App\Jurusan::all();
        return view('panitia.create', compact('divisis', 'jurusans'));

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
        $nama = $request->nama_lengkap;
        $nrp = $request->nrp;
        $jurusan = $request->jurusan;
        $divisi = $request->divisi;

        $status = DB::update('');
        return redirect()->action('PanitiaController@index');
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
        return view('panitia.show');

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
        $divisis = \App\Divisi::all();
        $jurusans = \App\Jurusan::all();
        $panitia = \App\Panitia::find($id);
        return view('panitia.edit', compact('divisis', 'jurusans', 'panitia'));

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
        return redirect()->action('PanitiaController@index');
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
        return redirect()->back();
    }
}
