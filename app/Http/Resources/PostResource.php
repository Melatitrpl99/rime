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
            'id' => $this->id,
            'judul' => $this->judul,
            'konten' => $this->konten,
            'post_category' => $this->post_category->name,
            'slug' => $this->slug,
            'user' => $this->user->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
