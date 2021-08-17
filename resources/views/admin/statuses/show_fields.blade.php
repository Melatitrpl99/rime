<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nama</div>
    <div class="col-12 col-md-9">{{ $status->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $status->desc }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $status->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $status->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>
