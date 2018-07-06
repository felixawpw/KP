<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'Mahasiswa';
    public $timestamps = false;

    protected $primaryKey = "NRP";

}
