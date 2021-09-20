<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewCartProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->whenLoaded('product')->id,
            'nama'           => $this->whenLoaded('product')->nama,
            'deskripsi'      => $this->whenLoaded('product')->deskripsi,
            'harga'          => $this->whenLoaded('product')->harga,
            'image'          => new FileResource($this->whenLoaded('product')->image),
            'pivot'          => [
                'color_id'  => $this->color_id,
                'size_id'   => $this->size_id,
                'jumlah'    => 1,
                'sub_total' => $this->whenLoaded('product')->harga,
                'color'     => $this->whenLoaded('color'),
                'size'      => $this->whenLoaded('size'),
            ],
        ];
    }
}
