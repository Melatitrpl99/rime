<!-- Product Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('product_id', 'Product:') !!}
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Colour Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('color_id', 'Color:') !!}
    {!! Form::select('color_id', $colorItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Size Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('size_id', 'Size:') !!}
    {!! Form::select('size_id', $sizeItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Dimension Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('dimension_id', 'Dimension:') !!}
    {!! Form::select('dimension_id', $dimensionItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Stok Ready Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('stok_ready', 'Stok Ready:') !!}
    {!! Form::number('stok_ready', null, ['class' => 'form-control']) !!}
</div>
