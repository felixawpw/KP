<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Barang as BarangResource;
use DB;

class Barang extends Model
{
	protected $table='Barang';
	protected $primaryKey = 'Id';
	public $timestamps = false;

	public function mahasiswas()
	{
        return $this->belongsToMany('App\Mahasiswa', 'Mhs_Barang', 'Id_Barang', 'NRP_Mhs')->withPivot('Id_Sesi');
	}
}
