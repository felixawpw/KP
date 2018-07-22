<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Panitia extends JsonResource
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
            'nrp_panitia' => $this->NRP,
            'nama' => $this->Nama,
            'nama_jurusan' => $this->Nama_Jurusan,
            'nama_divisi' => $this->Nama_Divisi,
        ];

    }
}
