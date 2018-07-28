<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pelanggar extends JsonResource
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
            'mhs' => $this->mahasiswa->user->Nama,
            'panitia' => $this->panitia->user->Nama,
            'sesi' => $this->sesi->Nama,
            'waktu' => explode(".", $this->Waktu)[0],
            'pelanggaran' => $this->pelanggaran->Nama,
            'id_sesi' => $this->sesi->Id,
            'id_panitia' => $this->NRP_Panitia,
            'id_pelanggaran' => $this->Id_Pelanggaran
        ];
    }
}
