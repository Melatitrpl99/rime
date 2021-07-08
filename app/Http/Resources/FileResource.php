<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'name' => $this->name,
            'fileable' => $this->fileable,
            'mime_type' => $this->mime_type,
            'format' => $this->format,
            'size' => $this->size,
            'path' => $this->path,
            'url' => $this->url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
