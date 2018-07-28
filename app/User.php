<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
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
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan' ,'Id_Jurusan');
    }

    public function recups()
    {
        return $this->belongsToMany('App\Recup', 'Mhs_Recup', 'NRP_Mhs', 'Id_Recup')->withPivot('Prioritas', 'Bukti', 'Diterima');
    }
}
