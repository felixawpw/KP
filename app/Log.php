<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $table = 'Log';
    public $timestamps = false;

    public static function insertLog($level, $panitia, $mhs, $sesi, $aktivitas)
    {
    	$log = new Log;
    	$log->Level = $level;
    	$log->NRP_Panitia = $panitia;
    	$log->NRP_Mhs = $mhs;
    	$log->Id_Sesi = $sesi;
    	$log->Waktu = \Carbon::now();
    	$log->Aktivitas = $aktivitas;
    	$log->save();
    }
}
