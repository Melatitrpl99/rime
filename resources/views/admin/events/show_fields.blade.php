<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Judul</div>
    <div class="col-12 col-md-9">{{ $event->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $event->deskripsi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Waktu Mulai</div>
    <div class="col-12 col-md-9">{{ $event->waktu_mulai->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Waktu Berakhir</div>
    <div class="col-12 col-md-9">{{ $event->waktu_berakhir->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Alamat</div>
    <div class="col-12 col-md-9">{{ $event->alamat }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nomor Handphone</div>
    <div class="col-12 col-md-9">{{ $event->no_hp }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Email</div>
    <div class="col-12 col-md-9">{{ $event->email }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $event->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $event->updated_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="row">
    <a class="btn btn-default" href="{{ route('admin.events.index') }}">Back</a>
</div>
