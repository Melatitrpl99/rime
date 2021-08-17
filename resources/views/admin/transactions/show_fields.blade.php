<!-- Nomor Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nomor</div>
    <div class="col-12 col-md-9">{{ $transaction->nomor }}</div>
</div>

<!-- Total Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Total</div>
    <div class="col-12 col-md-9">{{ rp($transaction->total) }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Tanggal transaksi</div>
    <div class="col-12 col-md-9">{{ $transaction->created_at->addHour(8) }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created At</div>
    <div class="col-12 col-md-9">{{ $transaction->created_at->addHour(8) }}</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated At</div>
    <div class="col-12 col-md-9">{{ $transaction->updated_at->addHour(8) }}</div>
</div>
