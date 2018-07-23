<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'Mahasiswa';
    protected $primaryKey = "NRP";

    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan' ,'Id_Jurusan');
    }
}
