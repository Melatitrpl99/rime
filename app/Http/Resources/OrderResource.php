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
            'nomor' => $this->nomor,
            'pesan' => $this->pesan,
            'kode_diskon' => $this->kode_diskon,
            'status' => $this->status->name,
            'user' => $this->user->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
