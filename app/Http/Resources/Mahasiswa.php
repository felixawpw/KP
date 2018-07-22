<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Mahasiswa extends JsonResource
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
            'nama' => $this->Nama,
            'nama_jurusan' => $this->Nama_Jurusan,
            'alfa' => $this->Alfa,
            'beta' => $this->Beta,
        ];
    }
}
