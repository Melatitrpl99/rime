<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Judul</div>
    <div class="col-12 col-md-9">{{ $cart->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $cart->deskripsi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Total</div>
    <div class="col-12 col-md-9">{{ rp($cart->total, true) }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User</div>
    <div class="col-12 col-md-9">{{ $cart->user->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $cart->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $cart->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>
