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
            'id' => $this->Id,
            'nama_pelanggaran' => $this->Nama_Pelanggaran,
            'nama_kategori' => $this->Nama_Kategori,
            'poin' => $this->Poin
        ];
    }
}
