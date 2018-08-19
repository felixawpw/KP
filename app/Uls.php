<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uls extends Model
{
    protected $table = 'ULS';
    protected $primaryKey = "Id";
    public $timestamps = false;

    public function mahasiswas()
    {
        return $this->belongsToMany('App\Mahasiswa', 'Mhs_ULS', 'Id_ULS', 'NRP_Mhs')->withPivot('Nilai');
    }
}
