<!-- User Id Field -->
<div class="form-group col-12">
    {!! Form::label('user_id', 'User') !!}
    {!! Form::select('user_id', $userItems, Route::currentRouteName() == 'admin.order_transactions.edit' ? $orderTransaction->order->user_id : null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-12">
    {!! Form::label('order_id', 'Order') !!}
    {!! Form::select('order_id', [], null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%', 'placeholder' => 'Pilih order']) !!}
</div>

<!-- Tanggal masuk Field -->
<div class="form-group col-12">
    {!! Form::label('tanggal_masuk', 'Tanggal masuk') !!}
    {!! Form::text('tanggal_masuk', null, ['class' => 'form-control datetimepicker-input', 'id' => 'tanggal_masuk', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#tanggal_masuk', 'autocomplete' => 'off']) !!}
</div>

{!! Form::hidden('total', 0, ['id' => 'total']) !!}

<!-- Total Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('displaytotal', 'Total') !!}
    {!! Form::text('displaytotal', null, ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
</div>

@include('admin.order_transactions.field_js')