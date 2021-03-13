<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', 'Desc:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Cust Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cust_price', 'Cust Price:') !!}
    {!! Form::number('cust_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Reseller Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reseller_price', 'Reseller Price:') !!}
    {!! Form::number('reseller_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Reseller Factor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reseller_factor', 'Reseller Factor:') !!}
    {!! Form::number('reseller_factor', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Size:') !!}
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- colour Field -->
<div class="form-group col-sm-6">
    {!! Form::label('colour', 'colour:') !!}
    {!! Form::text('colour', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>