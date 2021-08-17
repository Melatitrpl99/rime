<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'judul'     => $this->judul,
            'deskripsi' => $this->deskripsi,
            'total'     => $this->total,
            'products'  => CartProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
