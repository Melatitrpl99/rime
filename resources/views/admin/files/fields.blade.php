<!-- Name Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('path[]', 'Upload File:') !!}
    <div class="custom-file">
        {!! Form::file('path[]', null, ['class' => 'form-control custom-file-input']) !!}
        {!! Form::label('path[]', 'Select files...', ['class' => 'custom-file-label']) !!}
    </div>
</div>
