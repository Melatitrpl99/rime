<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_customer', 'Harga Customer:') !!}
    {!! Form::number('harga_customer', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Reseller Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_reseller', 'Harga Reseller:') !!}
    {!! Form::number('harga_reseller', null, ['class' => 'form-control']) !!}
</div>

<!-- Resellser Minimum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resellser_minimum', 'Resellser Minimum:') !!}
    {!! Form::number('resellser_minimum', null, ['class' => 'form-control']) !!}
</div>

<!-- Warna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warna', 'Warna:') !!}
    {!! Form::text('warna', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Size:') !!}
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Dimensi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dimensi', 'Dimensi:') !!}
    {!! Form::text('dimensi', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::select('category_id', $categoryItems, null, ['class' => 'form-control custom-select']) !!}
</div>
