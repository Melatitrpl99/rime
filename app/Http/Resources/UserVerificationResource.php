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
            'base_path'           => $this->base_path,
            'face_path'           => $this->face_path,
            'id_card_path'        => $this->id_card_path,
            'result'              => $this->result,
            'similarity'          => $this->similarity,
            'verification_status' => $this->whenLoaded('verificationStatus'),
        ];
    }
}
