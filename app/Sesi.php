<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    //
    protected $table = 'Sesi';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    // public function pelanggarans()
    // {
    // 	return $this->belongsToMany('App\Pelanggaran', 'mhs_pelanggaran', 'id_sesi', 'id_pelanggaran')->withPivot('nrp_panitia', 'nrp_mhs', 'waktu');
    // }
    
    public function presensis()
    {
    	return $this->hasMany('App\Presensi', 'Id_Sesi');
    }
}
