<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Panitia as Resource;

class Kelompok extends JsonResource
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
            'id_maping' => $this->NRP,
            'kelompok' => $this->Kelompok,
            'maping' => $this->panitia->user->Nama,
            'nama_jurusan' => $this->panitia->user->jurusan != null ? $this->panitia->user->jurusan->Nama : '-',
            'nrp' => $this->panitia->NRP_Pengguna,
        ];
    }
}
