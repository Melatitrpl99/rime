<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'judul'            => $this->judul,
            'konten'           => $this->konten,
            'post_category_id' => $this->post_category_id,
            'slug'             => $this->slug,
            'last_updated'     => $this->updated_at,
            'user'             => $this->whenLoaded('user'),
            'image'            => new FileResource($this->whenLoaded('image')),
            'post_category'    => $this->whenLoaded('postCategory'),
        ];
    }
}
