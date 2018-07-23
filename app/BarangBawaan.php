<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangBawaan extends Model
{
    //
    protected $table= "Mhs_Barang";

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

}
