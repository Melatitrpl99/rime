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
            'alamat_manual' => $this->alamat_manual,
            'kode_pos' => $this->kode_pos,
            'slug' => $this->slug,
            'order_id' => $this->order_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
