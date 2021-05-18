<!-- Judul Field -->
<div class="col-sm-12">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{{ $post->judul }}</p>
</div>

<!-- Konten Field -->
<div class="col-sm-12">
    {!! Form::label('konten', 'Konten:') !!}
    <p>{{ $post->konten }}</p>
</div>

<!-- Post Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('post_category_id', 'Post Category Id:') !!}
    <p>{{ $post->post_category_id }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $post->slug }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $post->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $post->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $post->updated_at }}</p>
</div>

