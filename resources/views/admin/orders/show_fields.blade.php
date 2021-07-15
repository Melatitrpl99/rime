<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nomor</div>
    <div class="col-12 col-md-9">{{ $order->nomor }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Pesan</div>
    <div class="col-12 col-md-9">{{ $order->pesan }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Total</div>
    <div class="col-12 col-md-9">Rp. {{ number_format($order->total, 2, ',', '.') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Diskon</div>
    <div class="col-12 col-md-9">Rp. {{ number_format($order->diskon, 2, ',', '.') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Biaya Pengiriman</div>
    <div class="col-12 col-md-9">Rp. {{ number_format($order->biaya_pengiriman, 2, ',', '.') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Status</div>
    <div class="col-12 col-md-9">{{ $order->status->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User</div>
    <div class="col-12 col-md-9">{{ $order->user->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $order->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $order->updated_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="row">
    <a class="btn btn-default" href="{{ route('admin.orders.index') }}">Back</a>
</div>
