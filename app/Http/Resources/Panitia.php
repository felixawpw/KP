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
            'nrp' => $this->NRP,
            'nama' => $this->Nama,
            'jurusan' => isset($this->jurusan->Nama) ? $this->jurusan->Nama : "-",
            'divisi' => $this->panitia->divisi->Nama,
        ];
    }
}
