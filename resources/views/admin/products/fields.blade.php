<!-- Nama Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12 ">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Customer Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('harga_customer', 'Harga Customer:') !!}
    {!! Form::number('harga_customer', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Reseller Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('harga_reseller', 'Harga Reseller:') !!}
    {!! Form::number('harga_reseller', null, ['class' => 'form-control']) !!}
</div>

<!-- Reseller Minimum Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('reseller_minimum', 'Reseller Minimum:') !!}
    {!! Form::number('reseller_minimum', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Category Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('product_category_id', 'Kategori:') !!}
    {!! Form::select('product_category_id', $productCategoryItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-12 h-100">
    {!! Form::label('path[]', 'Upload foto produk :') !!}
    {!! Form::file('path[]', ['class' => 'fileupload', 'multiple' => true]) !!}
</div>

@include('admin.products.table_fields')

@include('layouts.plugins.filepond')
