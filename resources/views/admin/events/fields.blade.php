<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Mulai Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    {!! Form::text('waktu_mulai', null, ['class' => 'form-control datetimepicker-input', 'id' => 'waktu_mulai', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_mulai']) !!}
</div>

<!-- Waktu Berakhir Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    {!! Form::text('waktu_berakhir', null, ['class' => 'form-control datetimepicker-input', 'id'=>'waktu_berakhir', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_berakhir']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Hp Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('nomor_hp', 'Nomor Hp:') !!}
    {!! Form::text('nomor_hp', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

@include('layouts.plugins.datetimepicker')
@push('scripts')
<script>
    $('#waktu_mulai').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: false
    });

    $('#waktu_berakhir').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: false
    });
</script>
@endpush
