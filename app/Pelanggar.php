<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggar extends Model
{
    //
    protected $table= "Mhs_Pelanggaran";

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa', 'NRP_Mhs');
    }

    public function panitia()
    {
    	return $this->belongsTo('App\Panitia', 'NRP_Panitia');
    }

    public function pelanggaran()
    {
    	return $this->belongsTo('App\Pelanggaran', 'Id_Pelanggaran');
    }

    public function sesi()
    {
    	return $this->belongsTo('App\Sesi', 'Id_Sesi');
    }
}
