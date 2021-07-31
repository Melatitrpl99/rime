<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Judul</div>
    <div class="col-12 col-md-9">{{ $post->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Konten</div>
    <div class="col-12 col-md-9">{{ $post->konten }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Post Category</div>
    <div class="col-12 col-md-9">{{ $post->postCategory->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User</div>
    <div class="col-12 col-md-9">{{ $post->user->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $post->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $post->updated_at->format('d F Y - H:m:s') }}</div>
</div>