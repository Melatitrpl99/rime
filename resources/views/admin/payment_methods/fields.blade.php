<!-- Name Field -->
<div class="form-group col-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Ket Field -->
<div class="form-group col-12 ">
    {!! Form::label('ket', 'Deskripsi:') !!}
    <span class="d-block text-sm">Variabel yang tersedia:</span>
    <ul class="text-sm list-unstyled">
        <li><span>::no_order</span></li>
        <li><span>::tgl_order</span></li>
        <li><span>::tgl_expire</span></li>
        <li><span>::total_order</span></li>
    </ul>
    {!! Form::textarea('ket', null, ['class' => 'form-control ckeditor']) !!}
</div>

@include('layouts.plugins.ckeditor5')