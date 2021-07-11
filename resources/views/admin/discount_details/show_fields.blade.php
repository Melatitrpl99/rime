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

