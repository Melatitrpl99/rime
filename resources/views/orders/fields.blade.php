<!-- Nomor Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_order', 'Nomor Order:') !!}
    {!! Form::text('nomor_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_order', 'Status Order:') !!}
    {!! Form::number('status_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Pesan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pesan', 'Pesan:') !!}
    {!! Form::textarea('pesan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_diskon', 'Kode Diskon:') !!}
    {!! Form::text('kode_diskon', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>