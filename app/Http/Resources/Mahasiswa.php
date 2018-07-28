<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Mahasiswa extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $kelompok = $this->mahasiswa->kelompoks()->orderBy('Kelompok')->get();
        $isValidated = $this->recups()->get()->count() != 0;
        return [
            'nrp' => $this->NRP,
            'nama' => $this->Nama,
            'nama_jurusan' => $this->jurusan->Nama,
            'angkatan' => $this->Angkatan,
            'alfa' => $kelompok != null && isset($kelompok[0]) ? $kelompok[0]->Kelompok : "-",
            'beta' => $kelompok != null && isset($kelompok[1]) ? $kelompok[1]->Kelompok : "-",
            'validasi' => $isValidated ? "Sudah" : "Belum",
            'penyakit' => $isValidated ? $this->Penyakit : "-",
            'recup_1' => $isValidated ? $this->recups()->wherePivot('Prioritas', '=', 1)->first()->Nama : "-",
            'recup_2' => $isValidated ? $this->recups()->wherePivot('Prioritas', '=', 0)->first()->Nama : "-"
        ];
    }
}
