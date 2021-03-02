<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $shipment->order_id }}</p>
</div>

<!-- Nama Lengkap Field -->
<div class="col-sm-12">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    <p>{{ $shipment->nama_lengkap }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $shipment->alamat }}</p>
</div>

<!-- Alamat Manual Field -->
<div class="col-sm-12">
    {!! Form::label('alamat_manual', 'Alamat Manual:') !!}
    <p>{{ $shipment->alamat_manual }}</p>
</div>

<!-- Kode Pos Field -->
<div class="col-sm-12">
    {!! Form::label('kode_pos', 'Kode Pos:') !!}
    <p>{{ $shipment->kode_pos }}</p>
</div>

<!-- Rt Field -->
<div class="col-sm-12">
    {!! Form::label('rt', 'Rt:') !!}
    <p>{{ $shipment->rt }}</p>
</div>

<!-- Rw Field -->
<div class="col-sm-12">
    {!! Form::label('rw', 'Rw:') !!}
    <p>{{ $shipment->rw }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $shipment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $shipment->updated_at }}</p>
</div>

