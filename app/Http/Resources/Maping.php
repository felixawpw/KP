<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Maping extends JsonResource
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
            'nrp_maping' => $this->NRP_mhs,
            'nama' => $this->Nama,
            'nama_jurusan' => $this->Nama_Jurusan,
            'alfa' => $this->Alfa == null ? '-' : $this->Alfa,
            'beta' => $this->Beta == null ? '-' : $this->Beta,
        ];
    }
}
