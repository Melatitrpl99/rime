<!-- Nomor Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nomor</div>
    <div class="col-12 col-md-9">{{ $order->nomor }}</div>
</div>

<!-- Pesan Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Pesan</div>
    <div class="col-12 col-md-9">{{ $order->pesan }}</div>
</div>

<!-- Total Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Total</div>
    <div class="col-12 col-md-9">{{ rp($order->total) }}</div>
</div>

<!-- Kode Diskon Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kode Diskon</div>
    <div class="col-12 col-md-9">{{ $order->kode_diskon }}</div>
</div>

<!-- Biaya Pengiriman Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Biaya Pengiriman</div>
    <div class="col-12 col-md-9">{{ rp($order->biaya_pengiriman) }}</div>
</div>

<!-- Berat Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Berat</div>
    <div class="col-12 col-md-9">{{ $order->berat > 1000 ? numerify($order->berat / 1000, true) . ' Kg' : numerify($order->berat) . ' gram' }}</div>
</div>

<!-- Status Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Status</div>
    <div class="col-12 col-md-9">{{ $order->status->name }}</div>
</div>

<!-- Shipment Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Alamat pengiriman</div>
    <div class="col-12 col-md-9">{{ $order->shipment->alamat }}</div>
</div>

<!-- User Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nama pelanggan</div>
    <div class="col-12 col-md-9">{{ $order->user->name }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created At</div>
    <div class="col-12 col-md-9">{{ $order->created_at->addHour(8)->format('d F Y H:m:s') }}</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated At</div>
    <div class="col-12 col-md-9">{{ $order->updated_at->addHour(8)->format('d F Y H:m:s') }}</div>
</div>
