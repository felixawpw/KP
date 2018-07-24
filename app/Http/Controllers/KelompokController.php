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
        $panitias = \App\Panitia::orderBy('Nama')->get();
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
        $k = $request->kelompok;
        $m = $request->maping;
        //$status = DB::update("sp_InsertKelompok $k, $m"); //Uncomment

        return redirect()->action('KelompokController@index');
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
        $panitias = \App\Panitia::orderBy('Nama')->get();

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
        $k = $request->kelompok;
        $m = $request->maping;
        //$status = DB::update("sp_UpdateKelompok $k, $m"); //Uncomment
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
        //$status = DB::update("exec sp_DeleteKelompok $kelompok"); //Uncomment
        return redirect()->back();
    }
}
