<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon, Auth, DB;
class ManualController extends Controller
{
    //
    public function show_presensi()
    {
    	$now = Carbon::now()->toDateTimeString();
    	$sesis = \App\Sesi::whereDate('Mulai', '=', $now)->get();
    	$timeNow = (int)str_replace(":", "", explode(' ',$now)[1]);
    	$tempSesi = $sesis[0];
    	$sesi = null;

    	foreach($sesis as $s)
    	{
    		$tempMulai = (int)str_replace(":", "", explode(" " ,$s->Mulai)[1]);
    		$tempAkhir = (int)str_replace(":", "", explode(" " ,$s->Akhir)[1]);

    		if($tempMulai <= $timeNow && $tempAkhir >= $timeNow)
    			$sesi = $s;
    	}

    	$mahasiswas = Auth::user()->panitia->kelompok()->where('Kelompok', 'like', "$sesi->Kelompok%")->first()->mahasiswas;
    	return view('manual.presensi', compact('sesi', 'now', 'mahasiswas'));
    }

    public function store_presensi(Request $request)
    {
    	$now = Carbon::now()->toDateTimeString();
    	$sesis = \App\Sesi::whereDate('Mulai', '=', $now)->get();
    	$timeNow = (int)str_replace(":", "", explode(' ',$now)[1]);
    	$tempSesi = $sesis[0];
    	$sesi = null;

    	foreach($sesis as $s)
    	{
    		$tempMulai = (int)str_replace(":", "", explode(" " ,$s->Mulai)[1]);
    		$tempAkhir = (int)str_replace(":", "", explode(" " ,$s->Akhir)[1]);

    		if($tempMulai <= $timeNow && $tempAkhir >= $timeNow)
    			$sesi = $s;
    	}

    	$mahasiswas = Auth::user()->panitia->kelompok()->where('Kelompok', 'like', "$sesi->Kelompok%")->first()->mahasiswas;
    	
        DB::beginTransaction();
        try 
        {
	    	$counter = 0;
	    	foreach($mahasiswas as $m)
	    	{
	    		if(isset($request["$m->NRP_Pengguna"]))
	    			if($request["$m->NRP_Pengguna"] == "hadir")
	    			{
	    				$m->presensi()->attach($sesi->Id, [ 'NRP_Panitia' => Auth::id() ]);
	    			}
	    	}
            \App\Log::insertLog("info", Auth::id(), null, $sesi->Id , "presensi toggle success");
			$status = "1;Presensi berhasil;";
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            \App\Log::insertLog("Error", Auth::id(), null, null, "presensi toggle failed : ".$e->getMessage());
            $status = "0;Presensi gagal;Anda sudah pernah melakukan presensi.";
        }
        DB::commit();
    	return redirect()->route('home')->with('status', $status);
    }

    public function show_bawaan()
    {
    	return view('manual.bawaan');
    }

    public function store_bawaan(Request $request)
    {

    }

}
