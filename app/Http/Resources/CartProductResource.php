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
            'image'          => new FileResource($this->whenLoaded('image')),
            'pivot'          => $this->whenPivotLoaded('cart_details', function () {
                return [
                    'color_id'  => $this->pivot->color_id,
                    'size_id'   => $this->pivot->size_id,
                    'size'      => $this->pivot->size,
                    'jumlah'    => $this->pivot->jumlah,
                    'sub_total' => $this->pivot->sub_total,
                    'color'     => $this->pivot->color,
                    'size'      => $this->pivot->size,
                ];
            }),
        ];
    }
}
