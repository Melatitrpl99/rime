<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $productColor->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $productColor->name }}</p>
</div>

<!-- Rgba Color Field -->
<div class="col-sm-12">
    {!! Form::label('rgba_color', 'Rgba Color:') !!}
    <p>{{ $productColor->rgba_color }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $productColor->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $productColor->updated_at }}</p>
</div>

