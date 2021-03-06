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
            'nrp' => $this->NRP_Mhs,
            'sesi' => $this->sesi->Nama,
            'panitia' => $this->panitia->user->Nama,
            'barang' => $this->barang->Nama,

            'id_sesi' => $this->sesi->Id,
            'id_panitia' => $this->NRP_Panitia,
            'id_barang' => $this->barang->Id,
        ];
    }
}
