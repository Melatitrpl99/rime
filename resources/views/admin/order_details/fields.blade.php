<!-- Colour Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('colour_id', 'Colour Id:') !!}
    {!! Form::select('colour_id', $colourItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Size Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size_id', 'Size Id:') !!}
    {!! Form::select('size_id', $sizeItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Dimension Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dimension_id', 'Dimension Id:') !!}
    {!! Form::select('dimension_id', $dimensionItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>