<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor', 'Nomor:') !!}
    {!! Form::number('nomor', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori', 'Kategori:') !!}
    {!! Form::text('kategori', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    {!! Form::number('jumlah_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Tambahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya_tambahan', 'Biaya Tambahan:') !!}
    {!! Form::number('biaya_tambahan', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_total', 'Sub Total:') !!}
    {!! Form::number('sub_total', null, ['class' => 'form-control']) !!}
</div>