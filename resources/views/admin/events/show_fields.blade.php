<!-- Judul Field -->
<div class="col-sm-12">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{{ $event->judul }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $event->deskripsi }}</p>
</div>

<!-- Waktu Mulai Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    <p>{{ $event->waktu_mulai }}</p>
</div>

<!-- Waktu Berakhir Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    <p>{{ $event->waktu_berakhir }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $event->alamat }}</p>
</div>

<!-- Nomor Hp Field -->
<div class="col-sm-12">
    {!! Form::label('nomor_hp', 'Nomor Hp:') !!}
    <p>{{ $event->nomor_hp }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $event->email }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $event->slug }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $event->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $event->updated_at }}</p>
</div>

