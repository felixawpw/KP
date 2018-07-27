<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recup extends Model
{
    //
    protected $table = 'Recup';
    protected $primaryKey = 'Id';
    // protected $timestamps = false;

    // public function mahasiswas()
    // {
    // 	return $this->belongsToMany('App\Mahasiswa', 'mhs_recup', 'id_recup', 'nrp_mhs')->withPivot('prioritas', 'bukti', 'diterima');
    // }
}
