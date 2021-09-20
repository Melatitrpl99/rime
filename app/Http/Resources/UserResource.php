<?php

namespace App\Http\Resources;

use App\Models\UserShipment;
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
            'nik'            => $this->nik,
            'nama_lengkap'   => $this->nama_lengkap,
            'email'          => $this->email,
            'jk' => $this->jk,
            'jenis_kelamin'  => $this->jenis_kelamin,
            'alamat'         => $this->alamat,
            'tempat_lahir'   => $this->tempat_lahir,
            'tgl_lahir'      => $this->tgl_lahir->format('Y-m-d'),
            'no_hp'          => $this->no_hp,
            'no_wa'          => $this->no_wa,
            'created_at'     => $this->created_at,
            'avatar'         => new FileResource($this->whenLoaded('avatar')),
            'user_shipments' => UserShipmentResource::collection($this->whenLoaded('userShipments')),
            'roles'          => $this->getRoleNames(),
        ];
    }
}
