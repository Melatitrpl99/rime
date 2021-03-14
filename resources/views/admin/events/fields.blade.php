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

<!-- Waktu Mulai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    {!! Form::text('waktu_mulai', null, ['class' => 'form-control','id'=>'waktu_mulai']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#waktu_mulai').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Waktu Berakhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    {!! Form::text('waktu_berakhir', null, ['class' => 'form-control','id'=>'waktu_berakhir']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#waktu_berakhir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Hp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_hp', 'Nomor Hp:') !!}
    {!! Form::text('nomor_hp', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>