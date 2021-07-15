<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nama</div>
    <div class="col-12 col-md-9">{{ $category->nama }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $category->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $category->updated_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="row">
    <a class="btn btn-default" href="{{ route('admin.categories.index') }}">Back</a>
</div>
