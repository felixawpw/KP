<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    //
    protected $table = 'Panitia';
    // protected $timestamps = false;

    protected $primaryKey = "NRP";

    public function divisi()
    {
    	return $this->belongsTo('App\Divisi', 'Id_Divisi');
    }

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan' ,'Id_Jurusan');
    }

    // public function mhs_barang()
    // {
    // 	return 
    // }
}
