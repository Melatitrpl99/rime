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

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categoryItems, null, ['class' => 'form-control custom-select']) !!}
</div>
