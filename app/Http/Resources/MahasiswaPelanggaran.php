<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaPelanggaran extends JsonResource
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
            'pelanggaran' => $this->Nama,
            'panitia' => \App\User::find($this->pivot->NRP_Panitia)->Nama,
            'sesi' => \App\Sesi::find($this->pivot->Id_Sesi)->Nama,
        ];
    }
}
