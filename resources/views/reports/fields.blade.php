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
    {!! Form::label('is_import', 'Is Import:') !!}
    {!! Form::number('is_import', null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Laporan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detail_laporan', 'Detail Laporan:') !!}
    {!! Form::textarea('detail_laporan', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>