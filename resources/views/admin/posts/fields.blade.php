<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Konten Field -->
<div class="form-group col-12">
    {!! Form::label('konten', 'Konten:') !!}
    {!! Form::textarea('konten', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Post Category Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('post_category_id', 'Post Category:') !!}
    {!! Form::select('post_category_id', $postCategoryItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Front Page Field -->
<div class="form-group col-12 col-sm-6">
    <label>Tampilkan banner?</label>
    <div class="custom-control custom-checkbox">
        {!! Form::hidden('front_page', 0) !!}
        {!! Form::checkbox('front_page', '1', null, ['class' => 'custom-control-input custom-control-input-primary', 'id' => 'front_page']) !!}
        {!! Form::label('front_page', 'Ya', ['class' => 'custom-control-label']) !!}
    </div>
</div>

<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-12 h-100">
    {!! Form::label('path[]', 'Upload foto banner:') !!}
    {!! Form::file('path[]', ['class' => 'fileupload', 'multiple' => false]) !!}
</div>

@include('layouts.plugins.ckeditor5')

@include('layouts.plugins.filepond', ['multiple' => false])