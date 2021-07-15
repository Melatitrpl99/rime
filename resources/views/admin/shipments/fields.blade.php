<!-- Nama Lengkap Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    {!! Form::text('nama_lengkap', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- No Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('no', 'No:') !!}
    {!! Form::text('no', null, ['class' => 'form-control']) !!}
</div>

<!-- Rt Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('rt', 'Rt:') !!}
    {!! Form::text('rt', null, ['class' => 'form-control']) !!}
</div>

<!-- Rw Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('rw', 'Rw:') !!}
    {!! Form::text('rw', null, ['class' => 'form-control']) !!}
</div>

<!-- Village Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('village_id', 'Desa / Kelurahan:') !!}
    {!! Form::select('village_id', $villageItems, null, ['class' => 'form-control select2']) !!}
</div>

@include('layouts.plugins.select2')

<!-- Kode Pos Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode_pos', 'Kode Pos:') !!}
    {!! Form::text('kode_pos', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('order_id', 'Order:') !!}
    {!! Form::select('order_id', $orderItems, null, ['class' => 'form-control custom-select']) !!}
</div>
