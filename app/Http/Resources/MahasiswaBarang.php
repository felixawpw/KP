<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaBarang extends JsonResource
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
            'barang' => \App\Barang::find($this->Id_Barang)->Nama,
            'panitia' => \App\User::find($this->NRP_Panitia)->Nama,
            'sesi' => \App\Sesi::find($this->Id_Sesi)->Nama,
        ];
    }
}
