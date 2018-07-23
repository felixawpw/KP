<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pelanggaran extends JsonResource
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
            "id" => $this->Id,
            "nama" => $this->Nama,
            "kategori" => $this->kategori_pelanggaran->Nama,
            "poin" => $this->Poin_Timpa
        ];
    }
}
