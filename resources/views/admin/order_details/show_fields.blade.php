<!-- Colour Id Field -->
<div class="col-sm-12">
    {!! Form::label('colour_id', 'Colour Id:') !!}
    <p>{{ $orderDetail->colour_id }}</p>
</div>

<!-- Size Id Field -->
<div class="col-sm-12">
    {!! Form::label('size_id', 'Size Id:') !!}
    <p>{{ $orderDetail->size_id }}</p>
</div>

<!-- Dimension Id Field -->
<div class="col-sm-12">
    {!! Form::label('dimension_id', 'Dimension Id:') !!}
    <p>{{ $orderDetail->dimension_id }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $orderDetail->jumlah }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $orderDetail->subtotal }}</p>
</div>

