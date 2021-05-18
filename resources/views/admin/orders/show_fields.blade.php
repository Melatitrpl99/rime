<!-- Nomor Field -->
<div class="col-sm-12">
    {!! Form::label('nomor', 'Nomor:') !!}
    <p>{{ $order->nomor }}</p>
</div>

<!-- Pesan Field -->
<div class="col-sm-12">
    {!! Form::label('pesan', 'Pesan:') !!}
    <p>{{ $order->pesan }}</p>
</div>

<!-- Kode Diskon Field -->
<div class="col-sm-12">
    {!! Form::label('kode_diskon', 'Kode Diskon:') !!}
    <p>{{ $order->kode_diskon }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{{ $order->status_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $order->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $order->updated_at }}</p>
</div>

