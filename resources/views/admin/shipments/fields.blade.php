<!-- Nama Lengkap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    {!! Form::text('nama_lengkap', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no', 'No:') !!}
    {!! Form::text('no', null, ['class' => 'form-control']) !!}
</div>

<!-- Rt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rt', 'Rt:') !!}
    {!! Form::text('rt', null, ['class' => 'form-control']) !!}
</div>

<!-- Rw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rw', 'Rw:') !!}
    {!! Form::text('rw', null, ['class' => 'form-control']) !!}
</div>

<!-- Desa Kelurahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('desa_kelurahan', 'Desa Kelurahan:') !!}
    {!! Form::text('desa_kelurahan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kecamatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kecamatan', 'Kecamatan:') !!}
    {!! Form::text('kecamatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kabupaten Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kabupaten_kota', 'Kabupaten Kota:') !!}
    {!! Form::text('kabupaten_kota', null, ['class' => 'form-control']) !!}
</div>

<!-- Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provinsi', 'Provinsi:') !!}
    {!! Form::text('provinsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Pos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_pos', 'Kode Pos:') !!}
    {!! Form::text('kode_pos', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::select('order_id', $orderItems, null, ['class' => 'form-control custom-select']) !!}
</div>
