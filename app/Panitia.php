<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    //
    protected $table = 'Panitia';
    public $timestamps = false;

    protected $primaryKey = "NRP_Pengguna";
    public $incrementing = false;

    public function divisi()
    {
    	return $this->belongsTo('App\Divisi', 'Id_Divisi');
    }

    public function kelompok()
    {
        return $this->hasMany('App\Kelompok', 'NRP', 'NRP_Pengguna');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'NRP_Pengguna', 'NRP');
    }
    // public function mhs_barang()
    // {
    // 	return 
    // }
}
