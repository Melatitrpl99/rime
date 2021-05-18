<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $file->name }}</p>
</div>

<!-- Fileable Field -->
<div class="col-sm-12">
    {!! Form::label('fileable', 'Fileable:') !!}
    <p>{{ $file->fileable }}</p>
</div>

<!-- Mime Type Field -->
<div class="col-sm-12">
    {!! Form::label('mime_type', 'Mime Type:') !!}
    <p>{{ $file->mime_type }}</p>
</div>

<!-- Format Field -->
<div class="col-sm-12">
    {!! Form::label('format', 'Format:') !!}
    <p>{{ $file->format }}</p>
</div>

<!-- Path Field -->
<div class="col-sm-12">
    {!! Form::label('path', 'Path:') !!}
    <p>{{ $file->path }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $file->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $file->updated_at }}</p>
</div>

