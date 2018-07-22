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
            'nrp_mhs' => $this->NRP_mhs,
            'nama_mhs' => $this->Nama_Mahasiswa,
            'sesi_1' => $this->Sesi_1 == null ? 'A' : 'H',
            'sesi_2' => $this->Sesi_2 == null ? 'A' : 'H',
            'sesi_3' => $this->Sesi_3 == null ? 'A' : 'H',
        ];
    }
}
