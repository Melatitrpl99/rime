<!-- Color Id Field -->
<div class="col-sm-12">
    {!! Form::label('color_id', 'Color Id:') !!}
    <p>{{ $cartDetail->color_id }}</p>
</div>

<!-- Size Id Field -->
<div class="col-sm-12">
    {!! Form::label('size_id', 'Size Id:') !!}
    <p>{{ $cartDetail->size_id }}</p>
</div>

<!-- Dimension Id Field -->
<div class="col-sm-12">
    {!! Form::label('dimension_id', 'Dimension Id:') !!}
    <p>{{ $cartDetail->dimension_id }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $cartDetail->jumlah }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $cartDetail->subtotal }}</p>
</div>

