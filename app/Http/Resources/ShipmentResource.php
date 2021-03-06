<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
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
            'nama_lengkap' => $this->nama_lengkap,
            'alamat' => $this->alamat,
            'no' => $this->no,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'village_id' => $this->village_id,
            'kode_pos' => $this->kode_pos,
            'catatan' => $this->catatan,
            'biaya' => $this->biaya,
            'order_id' => $this->order_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
