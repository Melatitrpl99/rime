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
            'id'               => $this->id,
            'nama'             => $this->nama,
            'deskripsi'        => $this->deskripsi,
            'harga_customer'   => $this->harga_customer,
            'harga_reseller'   => $this->harga_reseller,
            'reseller_minimum' => $this->reseller_minimum,
            'category_id'      => $this->category_id,
            'category'         => new CategoryResource($this->whenLoaded('category')),
            'total_stok'       => $this->product_stocks_sum_stok_ready,
            'product_stocks'   => ProductStockResource::collection($this->whenLoaded('productStocks'))
            // 'cart_jumlah'      => $this->whenPivotLoaded('cart_details', $this->pivot->jumlah),
            // 'cart_sub_total'   => $this->whenPivotLoaded('cart_details', $this->pivot->sub_total),
            // 'order_jumlah'     => $this->whenPivotLoaded('order_details', $this->pivot->jumlah),
            // 'order_sub_total'  => $this->whenPivotLoaded('order_details', $this->pivot->sub_total),
            // 'diskon_harga'     => $this->whenPivotLoaded('discount_details', $this->pivot->diskon_harga),
            // 'minimal_produk'   => $this->whenPivotLoaded('discount_details', $this->pivot->minimal_produk),
            // 'maksimal_produk'  => $this->whenPivotLoaded('discount_details', $this->pivot->maksimal_produk)
        ];
    }
}
