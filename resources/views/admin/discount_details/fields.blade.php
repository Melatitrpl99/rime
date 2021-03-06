<!-- Discount Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('discount_id', 'Discount:') !!}
    {!! Form::select('discount_id', $discountItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('product_id', 'Product:') !!}
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Diskon Harga Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('diskon_harga', 'Harga diskon:') !!}
    {!! Form::number('diskon_harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Minimal Produk Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('minimal_produk', 'Jumlah produk minimal:') !!}
    {!! Form::number('minimal_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Maksimal Produk Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('maksimal_produk', 'Jumlah produk maksimal:') !!}
    {!! Form::number('maksimal_produk', null, ['class' => 'form-control']) !!}
</div>
