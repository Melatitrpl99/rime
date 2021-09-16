<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonyResource extends JsonResource
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
            'id'         => $this->id,
            'product_id' => $this->product_id,
            'user_id'    => $this->user_id,
            'user'       => new UserListResource($this->whenLoaded('user')),
            'judul'      => $this->judul,
            'isi'        => $this->isi,
            'rating'     => $this->rating,
        ];
    }
}
