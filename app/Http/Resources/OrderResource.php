<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'nomor_order' => $this->nomor_order,
            'status_order' => $this->status_order,
            'pesan' => $this->pesan,
            'kode_diskon' => $this->kode_diskon,
            'slug' => $this->slug,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
