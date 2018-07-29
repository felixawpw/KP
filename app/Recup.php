<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recup extends Model
{
    //
    protected $table = 'Recup';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    public function mahasiswas()
    {
    	return $this->belongsToMany('App\Mahasiswa', 'Mhs_Recup', 'Id_Recup', 'NRP_Mhs')->withPivot('Prioritas', 'Bukti', 'Diterima');
    }
}
