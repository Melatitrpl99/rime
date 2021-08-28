<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserVerificationResource extends JsonResource
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
            'user_id' => $this->user_id,
            'result_token' => $this->result_token,
            'similarity' => $this->similarity,
            'accuracy' => $this->accuracy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
