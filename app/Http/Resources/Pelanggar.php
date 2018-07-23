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
            'mhs' => $this->mahasiswa->Nama,
            'panitia' => $this->panitia->Nama,
            'jurusan' => $this->mahasiswa->jurusan->Nama,
            'sesi' => $this->sesi->Nama,
            'waktu' => explode(".", $this->Waktu)[0],
            'pelanggaran' => $this->pelanggaran->Nama
        ];
    }
}
