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
            'id'                => $this->id,
            'nomor'             => $this->nomor,
            'pesan'             => $this->pesan,
            'total'             => $this->total,
            'jumlah'            => (int) $this->jumlah,
            'biaya_pengiriman'  => $this->biaya_pengiriman,
            'berat'             => $this->berat,
            'kode_resi'         => $this->kode_resi,
            'expiry_date'       => $this->expiry_date,
            'is_paid'           => $this->is_paid,
            'discount_id'       => $this->discount_id,
            'status_id'         => $this->status_id,
            'payment_method_id' => $this->payment_method_id,
            'user_shipment_id'  => $this->user_shipment_id,
            'status'            => $this->whenLoaded('status'),
            'payment_method'    => $this->whenLoaded('paymentMethod'),
            'user_shipment'     => new UserShipmentResource($this->whenLoaded('userShipment')),
            'products'          => OrderProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
