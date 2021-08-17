<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nomor</div>
    <div class="col-12 col-md-9">{{ $spending->nomor }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $spending->nomor }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Tanggal</div>
    <div class="col-12 col-md-9">{{ $spending->tanggal->format('d F Y H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kategori</div>
    <div class="col-12 col-md-9">{{ $spending->kategori }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Jumlah</div>
    <div class="col-12 col-md-9">{{ $spending->qty }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Total</div>
    <div class="col-12 col-md-9">{{ $spending->total }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $spending->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $spending->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>
