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
            'product_id' => $this->product_id,
            'color_id' => $this->color_id,
            'dimension_id' => $this->dimension_id,
            'size_id' => $this->size_id,
            'stok_ready' => $this->stok_ready,
            'color' => new ColorResource($this->whenLoaded('color')),
            'size' => new SizeResource($this->whenLoaded('size')),
            'dimension' => new DimensionResource($this->whenLoaded('dimension')),
        ];
    }
}
