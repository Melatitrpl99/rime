<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $productStock->product_id }}</p>
</div>

<!-- Stok Field -->
<div class="col-sm-12">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{{ $productStock->stok }}</p>
</div>

<!-- Warna Field -->
<div class="col-sm-12">
    {!! Form::label('warna', 'Warna:') !!}
    <p>{{ $productStock->warna }}</p>
</div>

<!-- Size Field -->
<div class="col-sm-12">
    {!! Form::label('size', 'Size:') !!}
    <p>{{ $productStock->size }}</p>
</div>

<!-- Dimensi Field -->
<div class="col-sm-12">
    {!! Form::label('dimensi', 'Dimensi:') !!}
    <p>{{ $productStock->dimensi }}</p>
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

