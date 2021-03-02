<!-- Cart Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cart_id', 'Cart Id:') !!}
    {!! Form::number('cart_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>