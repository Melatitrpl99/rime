<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'          => $this->name,
            'email'         => $this->email,
            'jenis_kelamin' => $this->user_jenis_kelamin,
            'jk'            => $this->jenis_kelamin,
            'tempat_lahir'  => $this->tempat_lahir,
            'tgl_lahir'     => $this->tgl_lahir,
            'no_hp'         => $this->no_hp,
            'no_wa'         => $this->no_wa,
            'created_at'    => $this->created_at,
            'avatar'        => new FileResource($this->whenLoaded('avatar')),
            'shipment'      => $this->defaultShipment,
            // 'shipments'     => ShipmentResource::collection($this->whenLoaded('shipments')),
            'roles'         => $this->getRoleNames(),
        ];
    }
}
