<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    //
    protected $table = 'Pelanggaran';
    protected $primaryKey = 'Id';
    // protected $timestamps = false;

    public function mahasiswas()
    {
    	return $this->belongsToMany('App\Mahasiswa', 'Mhs_Pelanggaran', 'Id_Pelanggaran','NRP_Mhs')->withPivot('NRP_Panitia', 'Id_Sesi', 'Waktu');
    }

    public function sesis()
    {
    	return $this->belongsToMany('App\Sesi', 'Mhs_Pelanggaran', 'Id_Pelanggaran', 'Id_Sesi')->withPivot('NRP_Panitia', 'NRP_Mhs', 'Waktu');
    }

   	public function panitias()
    {
    	return $this->belongsToMany('App\Panitia', 'mhs_pelanggaran', 'id_pelanggaran', 'nrp_panitia')->withPivot('id_sesi', 'nrp_mhs', 'waktu');
    }

    public function kategori_pelanggaran()
    {
    	return $this->belongsTo('App\Kategori_Pelanggaran', 'Id_Kategori');
    }
}
