<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Pelanggar extends Model
{
    //
    protected $table= "Mhs_Pelanggaran";
    public $timestamps = false;
    protected $primaryKey = ['Id_Sesi', 'NRP_Mhs', 'NRP_Panitia', 'Id_Pelanggaran'];
    public $incrementing = false;
    public $id_P = 0;
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
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('Id_Sesi', '=', $this->getAttribute('Id_Sesi'))
            ->where('NRP_Mhs', '=', $this->getAttribute('NRP_Mhs'))
            ->where('NRP_Panitia', '=', $this->getAttribute('NRP_Panitia'))
            ->where('Id_Pelanggaran', '=', $this->id_P);
        return $query;
    }

}
