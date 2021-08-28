<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'nomor'            => $this->nomor,
            'pesan'            => $this->pesan,
            'total'            => $this->total,
            'kode_diskon'      => $this->kode_diskon,
            'biaya_pengiriman' => $this->biaya_pengiriman,
            'berat'            => $this->berat,
            'status_id'        => $this->status_id,
            'shipment_id'      => $this->shipment_id,
            'status'           => $this->whenLoaded('status'),
            'jumlah'           => (int) $this->jumlah,
            'shipment'         => new ShipmentResource($this->whenLoaded('shipment')),
            'products'         => OrderProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
