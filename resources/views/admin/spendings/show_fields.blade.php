<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nomor</div>
    <div class="col-12 col-md-9">{{ $spending->nomor }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Judul</div>
    <div class="col-12 col-md-9">{{ $spending->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $spending->deskripsi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kategori</div>
    <div class="col-12 col-md-9">{{ $spending->spendingCategory->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Total</div>
    <div class="col-12 col-md-9">{{ rp($spending->total) }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $spending->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $spending->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>
