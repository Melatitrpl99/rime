<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuUtamaResource extends JsonResource
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
            'photo' => $this->photo,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'kategori' => $this->kategori,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

    }
}
