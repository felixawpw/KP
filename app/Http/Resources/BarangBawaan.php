<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangBawaan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nrp_mhs' => $this->NRP_mhs,
            'nama_mahasiswa' => $this->Nama_Mahasiswa,
            'nama_barang' => $this->Nama_Barang,
            'nama_sesi' => $this->Nama_Sesi,
            'nama_panitia' => $this->Nama_Panitia
        ];
    }
}
