<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Colour Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_id', 'Colour Id:') !!}
    {!! Form::select('color_id', $colorItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Size Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size_id', 'Size Id:') !!}
    {!! Form::select('size_id', $sizeItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Dimension Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dimension_id', 'Dimension Id:') !!}
    {!! Form::select('dimension_id', $dimensionItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Stok Ready Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok_ready', 'Stok Ready:') !!}
    {!! Form::number('stok_ready', null, ['class' => 'form-control']) !!}
</div>
