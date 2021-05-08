<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $spending->tanggal }}</p>
</div>

<!-- Nomor Field -->
<div class="col-sm-12">
    {!! Form::label('nomor', 'Nomor:') !!}
    <p>{{ $spending->nomor }}</p>
</div>

<!-- Kategori Field -->
<div class="col-sm-12">
    {!! Form::label('kategori', 'Kategori:') !!}
    <p>{{ $spending->kategori }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $spending->deskripsi }}</p>
</div>

<!-- Jumlah Barang Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    <p>{{ $spending->jumlah_barang }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $spending->total }}</p>
</div>

<!-- Biaya Tambahan Field -->
<div class="col-sm-12">
    {!! Form::label('biaya_tambahan', 'Biaya Tambahan:') !!}
    <p>{{ $spending->biaya_tambahan }}</p>
</div>

<!-- Sub Total Field -->
<div class="col-sm-12">
    {!! Form::label('sub_total', 'Sub Total:') !!}
    <p>{{ $spending->sub_total }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $spending->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $spending->updated_at }}</p>
</div>

