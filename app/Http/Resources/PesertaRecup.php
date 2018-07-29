<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;
class PesertaRecup extends JsonResource
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
            'nrp' => $this->NRP_Pengguna,
            'nama' => $this->user->Nama,
            'prioritas' => $this->pivot->Prioritas == 1 ? "Pertama" : "Kedua",
            'bukti' => $this->pivot->Bukti,
            'penerimaan' => $this->pivot->Diterima == 1 ? "Diterima" : "Tidak Diterima",
        ];
    }
}
