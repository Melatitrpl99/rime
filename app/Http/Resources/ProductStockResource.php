<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductStockResource extends JsonResource
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
            'id'           => $this->id,
            'product_id'   => $this->product_id,
            'color_id'     => $this->color_id,
            'size_id'      => $this->size_id,
            'stok_ready'   => $this->stok_ready,
            'color'        => $this->whenLoaded('color'),
            'size'         => $this->whenLoaded('size'),
        ];
    }
}
