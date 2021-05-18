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
            'id' => $this->id,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'harga_customer' => $this->harga_customer,
            'harga_reseller' => $this->harga_reseller,
            'resellser_minimum' => $this->resellser_minimum,
            'warna' => $this->warna,
            'size' => $this->size,
            'dimensi' => $this->dimensi,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
