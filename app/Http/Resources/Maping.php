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
        $temp = $this->kelompok()->orderBy('Kelompok')->get();
        return [
            'nrp' => $this->user->NRP,
            'nama' => $this->user->Nama,
            'nama_jurusan' => $this->user->jurusan != null ? $this->user->jurusan->Nama : "-",
            'alfa' => isset($temp[0]) ? $temp[0]->Kelompok : "-",
            'beta' => isset($temp[1]) ? $temp[1]->Kelompok : "-"
        ];
    }
}
