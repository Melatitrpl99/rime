<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Import Field -->
<div class="form-group col-12 col-sm-6">
    <label>Laporan eksternal?</label>
    <div class="custom-control custom-checkbox">
        {!! Form::hidden('is_import', 0) !!}
        {!! Form::checkbox('is_import', '1', null, ['class' => 'custom-control-input custom-control-input-info', 'id' => 'is_import']) !!}
        {!! Form::label('is_import', 'Ya', ['class' => 'custom-control-label']) !!}
    </div>
</div>

<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>
