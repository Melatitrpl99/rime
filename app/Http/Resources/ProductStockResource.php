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
            'stok' => $this->stok,
            'warna' => $this->warna,
            'size' => $this->size,
            'dimensi' => $this->dimensi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
