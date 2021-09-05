<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'                  => $this->id,
            'nama'                => $this->nama,
            'deskripsi'           => $this->deskripsi,
            'harga'               => $this->harga,
            'reseller_minimum'    => $this->reseller_minimum,
            'product_category_id' => $this->product_category_id,
            'suka'                => $this->suka,
            'review_avg'          => (float) number_format($this->testimonies_avg_rating, 2),
            'review_count'        => (int) $this->testimonies_count,
            'total_stok'          => (int) $this->product_stocks_sum_stok_ready,
            'image'               => new FileResource($this->whenLoaded('image')),
        ];
    }
}
