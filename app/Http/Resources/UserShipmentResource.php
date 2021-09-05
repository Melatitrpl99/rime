<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserShipmentResource extends JsonResource
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
            'kode_pos'   => $this->kode_pos,
            'catatan'    => $this->catatan,
            'is_default' => $this->is_default,
            'village_id' => $this->village_id,
            'village'    => $this->whenLoaded('village'),
        ];
    }
}
