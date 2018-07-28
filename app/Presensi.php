<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Presensi extends Model
{
    //
    protected $table = 'Mhs_Presensi';
    protected $primaryKey = ['Id_Sesi', 'NRP_Mhs'];
    public $incrementing = false;
    public $timestamps = false;
    
    public function sesi()
    {
    	return $this->belongsTo('App\Sesi', 'Id_Sesi');
    }

    public function panitia()
    {
    	return $this->belongsTo('App\Panitia', 'NRP_Panitia', 'NRP_Pengguna');
    }

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa', 'NRP_Mhs', 'NRP_Pengguna');
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('Id_Sesi', '=', $this->getAttribute('Id_Sesi'))
            ->where('NRP_Mhs', '=', $this->getAttribute('NRP_Mhs'));
        return $query;
    }
}
