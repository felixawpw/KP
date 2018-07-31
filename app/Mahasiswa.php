<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'Mahasiswa';
    protected $primaryKey = "NRP_Pengguna";
    public $timestamps = false;
    public $incrementing = false;

    public function kelompoks()
    {
    	return $this->hasMany('App\Mhs_Maping', 'NRP_Mhs');
    }
    public function user()
    {
    	return $this->belongsTo('App\User', 'NRP_Pengguna', 'NRP');
    }

    public function pelanggarans()
    {
        return $this->belongsToMany('App\Pelanggaran', 'Mhs_Pelanggaran', 'NRP_Mhs','Id_Pelanggaran')->withPivot('NRP_Panitia', 'Id_Sesi', 'Waktu');
    }

    public function ormawas()
    {
        return $this->belongsToMany('App\Ormawa', 'Mhs_Ormawa', 'NRP_Mhs','Id_Ormawa')->withPivot('prioritas');
    }


    public function presensis()
    {
        return $this->hasMany('App\Presensi', 'NRP_Mhs');
    }

    public function bawaans()
    {
        return $this->hasMany('App\BarangBawaan', 'NRP_Mhs');
    }
}
