<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
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
            'id'              => $this->id,
            'judul'           => $this->judul,
            'deskripsi'       => $this->deskripsi,
            'kode'            => $this->kode,
            'batas_pemakaian' => $this->batas_pemakaian,
            'waktu_mulai'     => $this->waktu_mulai,
            'waktu_berakhir'  => $this->waktu_berakhir,
            'detail'          => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
