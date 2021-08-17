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
            'user'             => $this->user->name,
            'last_updated'     => $this->updated_at,
        ];
    }
}
