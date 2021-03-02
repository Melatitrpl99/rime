<!-- Discount Id Field -->
<div class="col-sm-12">
    {!! Form::label('discount_id', 'Discount Id:') !!}
    <p>{{ $discountDetail->discount_id }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    <p>{{ $discountDetail->id_produk }}</p>
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

