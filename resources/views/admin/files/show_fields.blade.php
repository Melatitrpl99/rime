<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Name</div>
    <div class="col-12 col-md-9">{{ $file->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Fileable type / id</div>
    <div class="col-12 col-md-9">{{ $file->fileable_type }} / {{ $file->fileable_id }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">MIME type</div>
    <div class="col-12 col-md-9">{{ $file->mime_type }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Format</div>
    <div class="col-12 col-md-9">{{ $file->format }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Size</div>
    <div class="col-12 col-md-9">{{ $file->size }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Path</div>
    <div class="col-12 col-md-9">{{ $file->path }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">URL</div>
    <div class="col-12 col-md-9"><a href="{{ $file->url }}">{{ $file->url }}</a></div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $file->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $file->updated_at->format('d F Y - H:m:s') }}</div>
</div>
