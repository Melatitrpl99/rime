<!-- Judul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prouct_id', 'User Id:') !!}
    {!! Form::select('product_id', null, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Warna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warna', 'User Id:') !!}
    {!! Form::select('warna', null, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Ukuran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ukuran', 'User Id:') !!}
    {!! Form::select('ukuran', null, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'User Id:') !!}
    {!! Form::select('jumlah', null, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- number Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'User Id:') !!}
    {!! Form::select('number', null, null, ['class' => 'form-control custom-select']) !!}
</div>
 