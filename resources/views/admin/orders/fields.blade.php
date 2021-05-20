<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor', 'Nomor Order:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control','maxlength' => 16]) !!}
</div>

<!-- Pesan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pesan', 'Pesan:') !!}
    {!! Form::textarea('pesan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_diskon', 'Kode Diskon:') !!}
    {!! Form::text('kode_diskon', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', $statusItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>
