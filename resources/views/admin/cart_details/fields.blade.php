<!-- Cart Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cart_id', 'Cart Id:') !!}
    {!! Form::select('cart_id', $cartItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>