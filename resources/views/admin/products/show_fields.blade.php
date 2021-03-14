<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $product->nama }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $product->deskripsi }}</p>
</div>

<!-- Stok Field -->
<div class="col-sm-12">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{{ $product->stok }}</p>
</div>

<!-- Harga Customer Field -->
<div class="col-sm-12">
    {!! Form::label('harga_customer', 'Harga Customer:') !!}
    <p>{{ $product->harga_customer }}</p>
</div>

<!-- Harga Reseller Field -->
<div class="col-sm-12">
    {!! Form::label('harga_reseller', 'Harga Reseller:') !!}
    <p>{{ $product->harga_reseller }}</p>
</div>

<!-- Grosir Minimum Field -->
<div class="col-sm-12">
    {!! Form::label('grosir_minimum', 'Grosir Minimum:') !!}
    <p>{{ $product->grosir_minimum }}</p>
</div>

<!-- Warna Field -->
<div class="col-sm-12">
    {!! Form::label('warna', 'Warna:') !!}
    <p>{{ $product->warna }}</p>
</div>

<!-- Ukuran Field -->
<div class="col-sm-12">
    {!! Form::label('ukuran', 'Ukuran:') !!}
    <p>{{ $product->ukuran }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $product->slug }}</p>
</div>

<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $product->category_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

