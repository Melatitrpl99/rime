<!-- Judul Field -->
<div class="col-sm-12">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{{ $events->judul }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $events->deskripsi }}</p>
</div>

<!-- Waktu Mulai Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    <p>{{ $events->waktu_mulai }}</p>
</div>

<!-- Waktu Berakhir Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    <p>{{ $events->waktu_berakhir }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $events->alamat }}</p>
</div>

<!-- Nomor Hp Field -->
<div class="col-sm-12">
    {!! Form::label('nomor_hp', 'Nomor Hp:') !!}
    <p>{{ $events->nomor_hp }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $events->email }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $events->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $events->updated_at }}</p>
</div>

