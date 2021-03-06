<!-- Nomor Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('nomor', 'Nomor:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
</div>

<!-- Pesan Field -->
<div class="form-group col-12 ">
    {!! Form::label('pesan', 'Pesan:') !!}
    {!! Form::textarea('pesan', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Diskon Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('diskon', 'Diskon:') !!}
    {!! Form::number('diskon', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Pengiriman Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('biaya_pengiriman', 'Biaya Pengiriman:') !!}
    {!! Form::number('biaya_pengiriman', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', $statusItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>
