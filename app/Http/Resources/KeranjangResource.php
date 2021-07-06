<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeranjangResource extends JsonResource
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
            'gambar' =>$this->gambar,
            'nama_produk' =>$this->nama_produk,
            'jumlah' =>$this->jumlah,
            'ukuran' =>$this->ukuran,
            'warna' =>$this->warna,
            'sub_total' =>$this->sub_total,
            'diskon' =>$this->diskon,
            'biaya_pengiriman' =>$this->biaya_pengiriman,
            'total' =>$this->total
        ];
    }
}
