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

<!-- Reseller Minimum Field -->
<div class="col-sm-12">
    {!! Form::label('reseller_minimum', 'Reseller Minimum:') !!}
    <p>{{ $product->reseller_minimum }}</p>
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

