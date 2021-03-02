<!-- Cart Id Field -->
<div class="col-sm-12">
    {!! Form::label('cart_id', 'Cart Id:') !!}
    <p>{{ $orderDetail->cart_id }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $orderDetail->total }}</p>
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

