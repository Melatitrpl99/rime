<!-- Name Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Jarak Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('jarak', 'Jarak:') !!}
    {!! Form::number('jarak', null, ['class' => 'form-control']) !!}
</div>