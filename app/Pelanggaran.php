<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    // //
    // protected $table = 'Pelanggaran';
    // protected $timestamps = false;

    // public function mahasiswas()
    // {
    // 	return $this->belongsToMany('App\Mahasiswa', 'mhs_pelanggaran', 'id_pelanggaran', 'nrp_mhs')->withPivot('nrp_panitia', 'id_sesi', 'waktu');
    // }

    // public function sesis()
    // {
    // 	return $this->belongsToMany('App\Sesi', 'mhs_pelanggaran', 'id_pelanggaran', 'id_sesi')->withPivot('nrp_panitia', 'nrp_mhs', 'waktu');
    // }

   	// public function panitias()
    // {
    // 	return $this->belongsToMany('App\Panitia', 'mhs_pelanggaran', 'id_pelanggaran', 'nrp_panitia')->withPivot('id_sesi', 'nrp_mhs', 'waktu');
    // }

    // public function kategori_pelanggaran()
    // {
    // 	return $this->belongTo('App\Kategori_Pelanggaran', 'id_kategori');
    // }
}
