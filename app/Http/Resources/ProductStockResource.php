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
            'id' => $this->id,
            'product_id' => $this->product_id,
            'colour_id' => $this->colour_id,
            'size_id' => $this->size_id,
            'dimension_id' => $this->dimension_id,
            'stok_ready' => $this->stok_ready,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
