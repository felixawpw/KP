<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //
    protected $table = 'Jurusan';
    // protected $timestamps = false;
    protected $primaryKey = 'Id';

    public function fakultas()
    {
    	return $this->belongsTo('App\Fakultas', 'Id_Fakultas');
    }
}
