<!-- Discount Id Field -->
<div class="col-sm-12">
    {!! Form::label('discount_id', 'Discount Id:') !!}
    <p>{{ $discountDetail->discount_id }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $discountDetail->product_id }}</p>
</div>

<!-- Diskon Harga Field -->
<div class="col-sm-12">
    {!! Form::label('diskon_harga', 'Diskon Harga:') !!}
    <p>{{ $discountDetail->diskon_harga }}</p>
</div>

<!-- Minimal Produk Field -->
<div class="col-sm-12">
    {!! Form::label('minimal_produk', 'Minimal Produk:') !!}
    <p>{{ $discountDetail->minimal_produk }}</p>
</div>

<!-- Maksimal Produk Field -->
<div class="col-sm-12">
    {!! Form::label('maksimal_produk', 'Maksimal Produk:') !!}
    <p>{{ $discountDetail->maksimal_produk }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $discountDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $discountDetail->updated_at }}</p>
</div>

