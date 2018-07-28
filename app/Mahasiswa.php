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
}
