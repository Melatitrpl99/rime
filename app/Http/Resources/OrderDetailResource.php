<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'colour_id' => $this->colour_id,
            'size_id' => $this->size_id,
            'dimension_id' => $this->dimension_id,
            'jumlah' => $this->jumlah,
            'subtotal' => $this->subtotal
        ];
    }
}
