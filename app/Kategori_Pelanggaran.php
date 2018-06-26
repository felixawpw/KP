<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_Pelanggaran extends Model
{
    //
    protected $table = 'Kategori_Pelanggaran';
    protected $timestamps = false;

    public function pelanggarans()
    {
    	return $this->hasMany('App\Pelanggaran', 'id_kategori');
    }
}
