<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $partner->nama }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $partner->deskripsi }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $partner->alamat }}</p>
</div>

<!-- Lokasi Field -->
<div class="col-sm-12">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    <p>{{ $partner->lokasi }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $partner->email }}</p>
</div>

<!-- No Hp Field -->
<div class="col-sm-12">
    {!! Form::label('no_hp', 'No Hp:') !!}
    <p>{{ $partner->no_hp }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $partner->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $partner->updated_at }}</p>
</div>

