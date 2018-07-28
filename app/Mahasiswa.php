<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'Mahasiswa';
    protected $primaryKey = "NRP_Pengguna";
    public $timestamps = false;

    public function kelompoks()
    {
    	return $this->hasMany('App\Mhs_Maping', 'NRP_Mhs');
    }
    
}
