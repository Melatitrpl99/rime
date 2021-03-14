<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $orderDetail->order_id }}</p>
</div>

<!-- Cart Id Field -->
<div class="col-sm-12">
    {!! Form::label('cart_id', 'Cart Id:') !!}
    <p>{{ $orderDetail->cart_id }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $orderDetail->subtotal }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $orderDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $orderDetail->updated_at }}</p>
</div>

