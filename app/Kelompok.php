<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table="Panitia_Maping";
    public function panitia()
    {
    	return $this->belongsTo('App\Panitia', 'NRP', 'NRP');
    }
}
