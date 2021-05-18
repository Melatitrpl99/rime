<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountDetailResource extends JsonResource
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
            'discount_id' => $this->discount_id,
            'product_id' => $this->product_id,
            'diskon_harga' => $this->diskon_harga,
            'minimal_produk' => $this->minimal_produk,
            'maksimal_produk' => $this->maksimal_produk
        ];
    }
}
