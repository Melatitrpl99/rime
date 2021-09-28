<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Report Category Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('report_category_id', 'Kategori:') !!}
    {!! Form::select('report_category_id', $reportCategoryItems, null, ['class' => 'form-control custom-select']) !!}
    <a href="{{ route('admin.laba_rugi.index') }}" class="d-block mt-2" target="_blank">Buka laporan</a>
</div>

<!-- Is Import Field -->
<div class="form-group col-12 col-sm-6">
    <label>Impor laporan pre-sistem?</label>
    <div class="custom-control custom-checkbox">
        {!! Form::hidden('is_import', 0) !!}
        {!! Form::checkbox('is_import', '1', null, ['class' => 'custom-control-input custom-control-input-primary', 'id' => 'is_import']) !!}
        {!! Form::label('is_import', 'Ya', ['class' => 'custom-control-label']) !!}
    </div>
</div>


<!-- Waktu Mulai Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('laporan_mulai', 'Tanggal laporan mulai:') !!}
    {!! Form::text('laporan_mulai', null, ['class' => 'form-control datetimepicker-input', 'id' => 'laporan_mulai', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#laporan_mulai', 'autocomplete' => 'off']) !!}
</div>

<!-- Waktu Berakhir Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('laporan_selesai', 'Tanggal laporan selesai:') !!}
    {!! Form::text('laporan_selesai', null, ['class' => 'form-control datetimepicker-input', 'id' => 'laporan_selesai', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#laporan_selesai', 'autocomplete' => 'off']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-12 h-100">
    {!! Form::label('path[]', 'Upload laporan (.zip, .pdf)') !!}
    {!! Form::file('path[]', ['class' => 'fileupload', 'multiple' => true]) !!}
</div>

@include('admin.reports.field_js')