<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'judul'        => $this->judul,
            'deskripsi'    => $this->deskripsi,
            'jumlah'       => (int) $this->jumlah,
            'total'        => $this->total,
            'products'     => CartProductResource::collection($this->whenLoaded('products')),
            'last_updated' => $this->updated_at,
        ];
    }
}
