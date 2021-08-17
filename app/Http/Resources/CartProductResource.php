<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
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
            'id'             => $this->id,
            'nama'           => $this->nama,
            'deskripsi'      => $this->deskripsi,
            'harga_customer' => $this->harga_customer,
            'harga_reseller' => $this->harga_reseller,
            'color_id'       => $this->pivot->color_id,
            'size_id'       => $this->pivot->size_id,
            'color'          => $this->whenPivotLoaded('cart_details', function () {
                return $this->pivot->color;
            }),
            'size'           => $this->whenPivotLoaded('cart_details', function () {
                return $this->pivot->size;
            }),
            'sub_total'      => $this->whenPivotLoaded('cart_details', function () {
                return $this->pivot->sub_total;
            }),
            'jumlah'         => $this->whenPivotLoaded('cart_details', function () {
                return $this->pivot->jumlah;
            }),
        ];
    }
}
