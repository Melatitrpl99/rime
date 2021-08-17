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
            'id'         => $this->id,
            'alamat'     => $this->alamat,
            'village_id' => $this->village_id,
            'kode_pos'   => $this->kode_pos,
            'catatan'    => $this->catatan
        ];
    }
}
