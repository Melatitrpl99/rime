<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
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
            'harga_customer'      => $this->harga_customer,
            'harga_reseller'      => $this->harga_reseller,
            'reseller_minimum'    => $this->reseller_minimum,
            'suka'                => $this->suka,
            'product_category_id' => $this->product_category_id,
            'product_category'    => $this->whenLoaded('productCategory'),
            'review_avg'          => (float) number_format($this->testimonies_avg_review, 2),
            'review_count'        => (int) $this->testimonies_count,
            'total_stok'          => (int) $this->product_stocks_sum_stok_ready,
            'product_stocks'      => ProductStockResource::collection($this->whenLoaded('productStocks')),
            'images'              => FileResource::collection($this->whenLoaded('images')),
            'testimonies'         => TestimonyResource::collection($this->whenLoaded('testimonies')),
        ];
    }
}
