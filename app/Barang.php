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
	public static function getById($id)
	{
		return new BarangResource(Barang::find($id));
	}
}
