<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaPresensi extends JsonResource
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
            'panitia' => \App\User::find($this->NRP_Panitia)->Nama,
            'sesi' => \App\Sesi::find($this->Id_Sesi)->Nama
        ];
    }
}
