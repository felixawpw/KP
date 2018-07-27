<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'Mahasiswa';
    protected $primaryKey = "NRP_Pengguna";

    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan' ,'Id_Jurusan');
    }

    public function kelompoks()
    {
    	return $this->hasMany('App\Mhs_Maping', 'NRP_Mhs');
    }
    
}
