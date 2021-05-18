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

<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Batas Pemakaian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('batas_pemakaian', 'Batas Pemakaian:') !!}
    {!! Form::number('batas_pemakaian', null, ['class' => 'form-control']) !!}
</div>

<!-- Diskon Kategori Field -->
<div class="form-group col-sm-12">
    {!! Form::label('diskon_kategori', 'Diskon Kategori', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('diskon_kategori', "Customer", null, ['class' => 'form-check-input']) !!} customer
    </label>

    <label class="form-check">
        {!! Form::radio('diskon_kategori', "Reseller", null, ['class' => 'form-check-input']) !!} reseller
    </label>

</div>
