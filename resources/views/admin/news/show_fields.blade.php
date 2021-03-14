<!-- Judul Field -->
<div class="col-sm-12">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{{ $news->judul }}</p>
</div>

<!-- Konten Field -->
<div class="col-sm-12">
    {!! Form::label('konten', 'Konten:') !!}
    <p>{{ $news->konten }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $news->slug }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $news->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $news->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $news->updated_at }}</p>
</div>

