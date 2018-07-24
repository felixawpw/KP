<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Presensi extends JsonResource
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
            'nama' => $this->mahasiswa->Nama,
            'panitia' => $this->panitia->Nama,
            'id_sesi' => $this->sesi->Id,
            'sesi' => $this->sesi->Nama,
        ];
    }
}
