<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $harga = auth()->user()->hasRole('reseller')
            ? $this->harga_reseller
            : $this->harga_customer;

        return [
            'id'                  => $this->id,
            'nama'                => $this->nama,
            'deskripsi'           => $this->deskripsi,
            'harga'               => $harga,
            'reseller_minimum'    => $this->reseller_minimum,
            'suka'                => $this->suka,
            'product_category_id' => $this->product_category_id,
            'product_category'    => $this->whenLoaded('productCategory'),
            'image'               => new FileResource($this->whenLoaded('image')),
            'pivot'               => $this->whenPivotLoaded('order_details', function () {
                return [
                    'color_id'  => $this->pivot->color_id,
                    'color'     => $this->pivot->color,
                    'size_id'   => $this->pivot->size_id,
                    'size'      => $this->pivot->size,
                    'jumlah'    => $this->pivot->jumlah,
                    'sub_total' => $this->pivot->sub_total,
                    'diskon'    => $this->pivot->diskon,
                ];
            }),
        ];
    }
}
