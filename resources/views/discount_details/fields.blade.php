<!-- Discount Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount_id', 'Discount Id:') !!}
    {!! Form::number('discount_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    {!! Form::number('id_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Minimal Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('minimal_produk', 'Minimal Produk:') !!}
    {!! Form::number('minimal_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Maksimal Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maksimal_produk', 'Maksimal Produk:') !!}
    {!! Form::number('maksimal_produk', null, ['class' => 'form-control']) !!}
</div>