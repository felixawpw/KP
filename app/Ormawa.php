<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    //
    protected $table = "Ormawa";
    protected $primaryKey = "Id";
    public $timestamps = false;

    public function mahasiswas()
    {
    	return $this->belongsToMany('App\Mahasiswa', 'Mhs_Ormawa', 'Id_Ormawa','NRP_Mhs')->withPivot('Prioritas');
    }
}
