<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BarangBawaan extends Model
{
    //
    protected $table= "Mhs_Barang";
    public $timestamps = false;
    protected $primaryKey = ['Id_Sesi', 'NRP_Mhs', 'NRP_Panitia', 'Id_Barang'];
    public $incrementing = false;

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'NRP_Mhs');
    }

    public function panitia()
    {
    	return $this->belongsTo('App\Panitia', 'NRP_Panitia');
    }

    public function barang()
    {
    	return $this->belongsTo('App\Barang', 'Id_Barang');
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
            ->where('Id_Barang', '=', $this->getAttribute('Id_Barang'))
            ->where('NRP_Panitia', '=', $this->getAttribute('NRP_Panitia'));
        return $query;
    }

}
