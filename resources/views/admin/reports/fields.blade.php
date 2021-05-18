<!-- Judul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Import Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_import', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_import', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_import', 'Is Import', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>
