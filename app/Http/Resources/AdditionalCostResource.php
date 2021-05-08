<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalCostResource extends JsonResource
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
            'id' => $this->id,
            'tanggal' => $this->tanggal,
            'nomor' => $this->nomor,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
