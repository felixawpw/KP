<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Sesi extends JsonResource
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
            'nama' => $this->Nama,
            'mulai' => explode(".", $this->Mulai)[0],
            'akhir' => explode(".", $this->Akhir)[0],
            'kelompok' => $this->Kelompok,
        ];
    }
}
