<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $product->title }}</p>
</div>

<!-- Desc Field -->
<div class="col-sm-12">
    {!! Form::label('desc', 'Desc:') !!}
    <p>{{ $product->desc }}</p>
</div>

<!-- Stock Field -->
<div class="col-sm-12">
    {!! Form::label('stock', 'Stock:') !!}
    <p>{{ $product->stock }}</p>
</div>

<!-- Cust Price Field -->
<div class="col-sm-12">
    {!! Form::label('cust_price', 'Cust Price:') !!}
    <p>{{ $product->cust_price }}</p>
</div>

<!-- Reseller Price Field -->
<div class="col-sm-12">
    {!! Form::label('reseller_price', 'Reseller Price:') !!}
    <p>{{ $product->reseller_price }}</p>
</div>

<!-- Reseller Factor Field -->
<div class="col-sm-12">
    {!! Form::label('reseller_factor', 'Reseller Factor:') !!}
    <p>{{ $product->reseller_factor }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $product->slug }}</p>
</div>

<!-- Colour Field -->
<div class="col-sm-12">
    {!! Form::label('colour', 'Colour:') !!}
    <p>{{ $product->colour }}</p>
</div>

<!-- Size Field -->
<div class="col-sm-12">
    {!! Form::label('size', 'Size:') !!}
    <p>{{ $product->size }}</p>
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

