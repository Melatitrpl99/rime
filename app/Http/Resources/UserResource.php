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
            'nik'            => $this->nik ?? null,
            'nama_lengkap'   => $this->nama_lengkap ?? null,
            'email'          => $this->email ?? null,
            'jk'             => $this->jk ?? null,
            'jenis_kelamin'  => $this->jenis_kelamin ?? null,
            'alamat'         => $this->alamat ?? null,
            'tempat_lahir'   => $this->tempat_lahir ?? null,
            'tgl_lahir'      => !is_null($this->tgl_lahir) ? $this->tgl_lahir->format('Y-m-d') : null,
            'no_hp'          => $this->no_hp ?? null,
            'no_wa'          => $this->no_wa ?? null,
            'created_at'     => $this->created_at ?? null,
            'avatar'         => new FileResource($this->whenLoaded('avatar')),
            'user_shipments' => UserShipmentResource::collection($this->whenLoaded('userShipments')),
            'roles'          => $this->getRoleNames(),
        ];
    }
}
