<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order:') !!}
    {!! Form::select('order_id', $orderItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product:') !!}
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Color Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_id', 'Color:') !!}
    {!! Form::select('color_id', $colorItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Size Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size_id', 'Size:') !!}
    {!! Form::select('size_id', $sizeItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Dimension Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dimension_id', 'Dimension:') !!}
    {!! Form::select('dimension_id', $dimensionItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>
