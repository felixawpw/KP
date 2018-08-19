<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage, DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggarans = \App\Pelanggaran::withCount('mahasiswas')->orderBy('mahasiswas_count', 'desc')->get();

        $uls = \App\Uls::all();
        $rataULS = array();

        $totalMHS = \App\Mahasiswa::all()->count();
        $kerjaULS = \App\Mahasiswa::all()->count() - \App\Mahasiswa::doesntHave('uls')->count();

        foreach($uls as $u)
        {
            $u->rata = 0;
            $u->prosentaseKerja = round($u->mahasiswas()->count() / $kerjaULS * 100, 2);
            $i = 0;
            foreach($u->mahasiswas as $mu)
            {
                $i++;
                $u->rata += $mu->pivot->Nilai;
            }
            $u->rata /= $i == 0 ? 1 : $i;
        }

        $sesis = \App\Sesi::all();
        $ses = array();
        foreach ($sesis as $s)
        {
            $s->total = $s->presensis()->count();
            if (!isset($ses[explode(' ' , $s->Mulai)[0].""]))
                $ses[explode(' ' , $s->Mulai)[0].""] = $s;
        }

        $ormawas = \App\Ormawa::all();

        foreach($ormawas as $o)
        {
            $o->total = $o->mahasiswas()->count();
            $o->p1 = $o->mahasiswas()->wherePivot('Prioritas', '=', 1)->count();
            $o->p2 = $o->mahasiswas()->wherePivot('Prioritas', '=', 2)->count();
        }

        //UBAH INI
        $pD1 = \App\Pelanggar::select('Id_Pelanggaran', DB::raw('count(*) as total'))->whereIn('Id_Sesi', array(2,3,4))->groupBy('Id_Pelanggaran')->orderBy('total', 'desc')->get();
        $pD2 = \App\Pelanggar::select('Id_Pelanggaran', DB::raw('count(*) as total'))->whereIn('Id_Sesi', array(5,6,7))->groupBy('Id_Pelanggaran')->orderBy('total', 'desc')->get();
        $pD3 = \App\Pelanggar::select('Id_Pelanggaran', DB::raw('count(*) as total'))->whereIn('Id_Sesi', array(8,9,10))->groupBy('Id_Pelanggaran')->orderBy('total', 'desc')->get();
        $pD4 = \App\Pelanggar::select('Id_Pelanggaran', DB::raw('count(*) as total'))->whereIn('Id_Sesi', array(11,12))->groupBy('Id_Pelanggaran')->orderBy('total', 'desc')->get();
        $pD5 = \App\Pelanggar::select('Id_Pelanggaran', DB::raw('count(*) as total'))->whereIn('Id_Sesi', array(13,14))->groupBy('Id_Pelanggaran')->orderBy('total', 'desc')->get();
        $pD6 = \App\Pelanggar::select('Id_Pelanggaran', DB::raw('count(*) as total'))->whereIn('Id_Sesi', array(15,16))->groupBy('Id_Pelanggaran')->orderBy('total', 'desc')->get();
        $pD7 = \App\Pelanggar::select('Id_Pelanggaran', DB::raw('count(*) as total'))->whereIn('Id_Sesi', array(17,18))->groupBy('Id_Pelanggaran')->orderBy('total', 'desc')->get();
        //END UBAH INI
        $pelanggaranByDay = array(
                $pD1,
                $pD2,
                $pD3,
                $pD4,
                $pD5,
                $pD6,
                $pD7
            );

        $bawaans = \App\Barang::withCount('mahasiswas')->orderBy('mahasiswas_count', 'desc')->get();

        $recups = \App\Recup::all();

        foreach($recups as $o)
        {
            $o->total = $o->mahasiswas()->count();
            $o->p1 = $o->mahasiswas()->wherePivot('Prioritas', '=', 1)->count();
            $o->p2 = $o->mahasiswas()->wherePivot('Prioritas', '=', 2)->count();
        }
        return view('home', 
            compact(
                'pelanggarans', 
                'uls', 
                'kerjaULS', 
                'totalMHS', 
                'ses', 
                'ormawas', 
                'pelanggaranByDay', 
                'bawaans',
                'recups'
                )
            );
    }

    public function convertToPhp()
    {
        return base64_encode(Storage::get("bukti/160717006.PNG"));
    }

    public function report()
    {
        $pelanggarans = \App\Pelanggaran::withCount('mahasiswas')->orderBy('mahasiswas_count', 'desc')->get();

        $uls = \App\Uls::all();
        $rataULS = array();
        foreach($uls as $u)
        {
            $u->rata = 0;
            $i = 0;
            foreach($u->mahasiswas as $mu)
            {
                $i++;
                $u->rata += $mu->pivot->Nilai;
            }
            $u->rata /= $i == 0 ? 1 : $i;
        }
        $totalMHS = \App\Mahasiswa::all()->count();
        $kerjaULS = \App\Mahasiswa::all()->count() - \App\Mahasiswa::doesntHave('uls')->count();

        $sesis = \App\Sesi::all();
        $ses = array();
        foreach ($sesis as $s)
        {
            $s->total = $s->presensis()->count();
            if (!isset($ses[explode(' ' , $s->Mulai)[0].""]))
                $ses[explode(' ' , $s->Mulai)[0].""] = $s;
        }
        return view('report', compact('pelanggarans', 'uls' ,'kerjaULS', 'totalMHS', 'ses'));
    }
}
