<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Judul</div>
    <div class="col-12 col-md-9">{{ $discount->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $discount->deskripsi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kode Diskon</div>
    <div class="col-12 col-md-9">{{ $discount->kode }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Batas Pemakaian</div>
    <div class="col-12 col-md-9">{{ $discount->batas_pemakaian }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Waktu Mulai</div>
    <div class="col-12 col-md-9">{{ $discount->waktu_mulai->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Waktu Berakhir</div>
    <div class="col-12 col-md-9">{{ $discount->waktu_berakhir->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $discount->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $discount->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>