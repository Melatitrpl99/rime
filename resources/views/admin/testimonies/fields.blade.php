<!-- Product Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('product_id', 'Product:') !!}
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Isi Field -->
<div class="form-group col-12">
    {!! Form::label('isi', 'Isi:') !!}
    {!! Form::textarea('isi', null, ['class' => 'form-control']) !!}
</div>

<!-- Review Field -->
<div class="form-group col-12">
    {!! Form::label('review', 'Review:') !!}
    <div class="form-group row pl-2">
        <div class="custom-control custom-radio custom-control-inline">
            {!! Form::radio('review', '1', null, ['class' => 'custom-control-input', 'id' => 'review_1']) !!}
            {!! Form::label('review_1', 'Satu', ['class' => 'custom-control-label']) !!}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {!! Form::radio('review', '2', null, ['class' => 'custom-control-input', 'id' => 'review_2']) !!}
            {!! Form::label('review_2', 'Dua', ['class' => 'custom-control-label']) !!}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {!! Form::radio('review', '3', null, ['class' => 'custom-control-input', 'id' => 'review_3']) !!}
            {!! Form::label('review_3', 'Tiga', ['class' => 'custom-control-label']) !!}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {!! Form::radio('review', '4', null, ['class' => 'custom-control-input', 'id' => 'review_4']) !!}
            {!! Form::label('review_4', 'Empat', ['class' => 'custom-control-label']) !!}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {!! Form::radio('review', '5', null, ['class' => 'custom-control-input', 'id' => 'review_5']) !!}
            {!! Form::label('review_5', 'Lima', ['class' => 'custom-control-label']) !!}
        </div>
    </div>
</div>