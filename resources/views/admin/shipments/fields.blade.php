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

<!-- Alamat Manual Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat_manual', 'Alamat Manual:') !!}
    {!! Form::textarea('alamat_manual', null, ['class' => 'form-control']) !!}
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
