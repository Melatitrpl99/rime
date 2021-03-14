<!-- Nomor Transaksi Field -->
<div class="col-sm-12">
    {!! Form::label('nomor_transaksi', 'Nomor Transaksi:') !!}
    <p>{{ $transaction->nomor_transaksi }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $transaction->total }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $transaction->user_id }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $transaction->slug }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transaction->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transaction->updated_at }}</p>
</div>

