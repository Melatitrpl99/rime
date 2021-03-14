<!-- Transaction Id Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    <p>{{ $transactionDetail->transaction_id }}</p>
</div>

<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $transactionDetail->order_id }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $transactionDetail->subtotal }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transactionDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transactionDetail->updated_at }}</p>
</div>

