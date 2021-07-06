<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailOrderResource extends JsonResource
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
            'no order' => $this->no_order,
            'diskon' => $this->diskon,
            'pesan' => $this->pesan,
            'alamat_pengiriman' => $this->alamat_pengiriman,
            'sub_total' => $this->sub_total
        ];
    }
}
