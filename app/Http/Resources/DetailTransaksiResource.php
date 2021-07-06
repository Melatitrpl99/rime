<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailTransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'no_transaksi' => $this->no_transaksi,
            'tgl_transaksi' => $this->tgl_transaksi,
            'jumlah_item' => $this->jumlah_item,
            'total_harga' => $this->total_harga,
            'order' => $this->orders
        ];
    }
}
