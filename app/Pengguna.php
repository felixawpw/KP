<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    //
    protected $table="Pengguna";
    protected $primaryKey = "NRP";
    public $timestamps = false;

    public function mahasiswa()
    {
    	return $this->hasOne('App\Mahasiswa', 'NRP_Pengguna');
    }
    public function panitia()
    {
    	return $this->hasOne('App\Panitia', 'NRP_Pengguna');
    }
}
