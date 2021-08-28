<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Name</div>
    <div class="col-12 col-md-9">{{ $user->nama_lengkap }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Email</div>
    <div class="col-12 col-md-9">{{ $user->email }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $user->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $user->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>
