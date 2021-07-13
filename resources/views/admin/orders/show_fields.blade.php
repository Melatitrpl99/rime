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

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $order->total }}</p>
</div>

<!-- Diskon Field -->
<div class="col-sm-12">
    {!! Form::label('diskon', 'Diskon:') !!}
    <p>{{ $order->diskon }}</p>
</div>

<!-- Biaya Pengiriman Field -->
<div class="col-sm-12">
    {!! Form::label('biaya_pengiriman', 'Biaya Pengiriman:') !!}
    <p>{{ $order->biaya_pengiriman }}</p>
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

