<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    //
    protected $table = 'Sesi';
    protected $timestamps = false;

    public function pelanggarans()
    {
    	return $this->belongsToMany('App\Pelanggaran', 'mhs_pelanggaran', 'id_sesi', 'id_pelanggaran')->withPivot('nrp_panitia', 'nrp_mhs', 'waktu');
    }
    
}
