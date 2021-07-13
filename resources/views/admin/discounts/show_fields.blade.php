<!-- Judul Field -->
<div class="col-sm-12">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{{ $discount->judul }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $discount->deskripsi }}</p>
</div>

<!-- Kode Field -->
<div class="col-sm-12">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $discount->kode }}</p>
</div>

<!-- Batas Pemakaian Field -->
<div class="col-sm-12">
    {!! Form::label('batas_pemakaian', 'Batas Pemakaian:') !!}
    <p>{{ $discount->batas_pemakaian }}</p>
</div>

<!-- Waktu Mulai Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    <p>{{ $discount->waktu_mulai }}</p>
</div>

<!-- Waktu Berakhir Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    <p>{{ $discount->waktu_berakhir }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $discount->slug }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $discount->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $discount->updated_at }}</p>
</div>

