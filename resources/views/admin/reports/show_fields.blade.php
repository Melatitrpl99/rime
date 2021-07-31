<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Judul</div>
    <div class="col-12 col-md-9">{{ $report->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $report->deskripsi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Laporan Eksternal?</div>
    <div class="col-12 col-md-9">{!! $report->is_import ? 'Ya <i class="fas fa-check text-success"></i>' : 'Tidak <i class="fas fa-times text-danger"></i>' !!}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User</div>
    <div class="col-12 col-md-9">{{ $report->user->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $report->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $report->updated_at->format('d F Y - H:m:s') }}</div>
</div>
