<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table="Panitia_Maping";
    protected $primaryKey = "Kelompok";
    public $incrementing = false;
    public $timestamps = false;

    public function panitia()
    {
    	return $this->belongsTo('App\Panitia', 'NRP', 'NRP_Pengguna');
    }
}
