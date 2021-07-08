<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $productStock->product_id }}</p>
</div>

<!-- Colour Id Field -->
<div class="col-sm-12">
    {!! Form::label('colour_id', 'Colour Id:') !!}
    <p>{{ $productStock->colour_id }}</p>
</div>

<!-- Size Id Field -->
<div class="col-sm-12">
    {!! Form::label('size_id', 'Size Id:') !!}
    <p>{{ $productStock->size_id }}</p>
</div>

<!-- Dimension Id Field -->
<div class="col-sm-12">
    {!! Form::label('dimension_id', 'Dimension Id:') !!}
    <p>{{ $productStock->dimension_id }}</p>
</div>

<!-- Stok Ready Field -->
<div class="col-sm-12">
    {!! Form::label('stok_ready', 'Stok Ready:') !!}
    <p>{{ $productStock->stok_ready }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $productStock->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $productStock->updated_at }}</p>
</div>

