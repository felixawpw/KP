<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    //
    protected $table = 'Mhs_Presensi';

    public function sesi()
    {
    	return $this->belongsTo('App\Sesi', 'Id_Sesi');
    }

    public function panitia()
    {
    	return $this->belongsTo('App\Panitia', 'NRP_Panitia');
    }

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa', 'NRP_Mhs');
    }
}
