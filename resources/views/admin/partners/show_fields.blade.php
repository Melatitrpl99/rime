<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nama</div>
    <div class="col-12 col-md-9">{{ $partner->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $partner->deskripsi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Alamat</div>
    <div class="col-12 col-md-9">{{ $partner->alamat }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Lokasi</div>
    <div class="col-12 col-md-9">{{ $partner->lokasi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Email</div>
    <div class="col-12 col-md-9">{{ $partner->email }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nomor Handphone</div>
    <div class="col-12 col-md-9">{{ $partner->no_hp }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $partner->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $partner->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>