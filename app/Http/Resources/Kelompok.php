<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => $this->Id,
            'nama_kelompok' => $this->Nama_Kelompok,
            'nama_mahasiswa' => $this->Nama_Mahasiswa,
        ];
    }
}
