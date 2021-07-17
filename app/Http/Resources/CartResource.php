<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'id'        => $this->id,
            'nomor'     => $this->nomor,
            'judul'     => $this->judul,
            'deskripsi' => $this->deskripsi,
            'total'     => $this->total,
            'detail'    => ProductResource::collection($this->whenLoaded('products')),
            // 'pivot'     => $this->whenPivotLoaded('cart_details', function () {
            //     return [
            //         'jumlah' => $this->pivot->jumlah,
            //         'sub_total' => $this->pivot->sub_total,
            //         'produk' => ProductResource::collection($this->pivot->product),
            //     ];
            // })
            // 'detail'    => array_merge(
            //     $this->relationLoaded('products', function ($pivot) {
            //         return [
            //             'jumlah' => $pivot->jumlah,
            //             'sub_total' => $pivot->sub_total
            //         ];
            //     })
            // ),
        ];
    }
}
