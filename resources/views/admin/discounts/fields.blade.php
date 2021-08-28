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

<!-- Kode Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    <div class="input-group">
        {!! Form::text('kode', null, ['class' => 'form-control']) !!}
        <div class="input-group-append">
            <button class="btn btn-info" type="button" id="random_discount_code">
                Buat Kode Random
            </button>
        </div>
    </div>
</div>

<!-- Batas Pemakaian Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('batas_pemakaian', 'Batas Pemakaian:') !!}
    {!! Form::number('batas_pemakaian', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Mulai Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    {!! Form::text('waktu_mulai', null, ['class' => 'form-control datetimepicker-input', 'id' => 'waktu_mulai', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_mulai', 'autocomplete' => 'off']) !!}
</div>

<!-- Waktu Berakhir Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    {!! Form::text('waktu_berakhir', null, ['class' => 'form-control datetimepicker-input', 'id' => 'waktu_berakhir', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_berakhir', 'autocomplete' => 'off']) !!}
</div>

<div class="col-12 mt-4 mb-2">
    <h4>Detail diskon</h4>
</div>

<div class="col-12 col-sm-6 col-md-5">
    {!! Form::label('products', 'Produk:') !!}
    {!! Form::select('products', $productItems, null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih produk...', 'style' => 'width: 100%']) !!}
</div>

<div class="col-12 col-sm-6 col-md-2">
    {!! Form::label('discount_min', 'Min. Pembelian:') !!}
    {!! Form::number('discount_min', null, ['class' => 'form-control', 'min' => 0]) !!}
</div>

<div class="col-12 col-sm-6 col-md-2">
    {!! Form::label('discount_max', 'Maks. Pembelian:') !!}
    {!! Form::number('discount_max', null, ['class' => 'form-control', 'min' => 0]) !!}
</div>

<div class="col-12 col-sm-6 col-md-3">
    {!! Form::label('discount_price', 'Diskon:') !!}
    {!! Form::number('discount_price', null, ['class' => 'form-control', 'min' => 0]) !!}
</div>

<div class="col-12 mt-4 mb-2 d-flex justify-content-end align-items-center">
    <button type="button" id="add_row" class="ml-2 btn btn-primary">
        <i class="fas fa-plus mr-sm-1"></i>
        <span class="d-none d-sm-inline">Tambah Data</span>
    </button>
    <button type="button" id="remove_row" class="ml-2 btn btn-danger">
        <i class="fas fa-trash-alt mr-sm-1"></i>
        <span class="d-none d-sm-inline">Hapus Data</span>
    </button>
</div>

<div class="mt-4 col-12 table-responsive">
    <table class="table table-borderless" style="min-width: 1024px">
        <thead>
            <tr class="border-bottom">
                <th width="40">#</th>
                <th>Produk</th>
                <th width="150" class="text-right">Min. Pembelian</th>
                <th width="150" class="text-right">Maks. Pembelian</th>
                <th width="180" class="text-right">Diskon Harga</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.discounts.edit')
                @foreach ($discount->products as $product)
                    <tr>
                        <td class="py-0.5">{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>
                            {!! Form::hidden('product_id[]', $product->id) !!}
                            <span>{{ $product->nama }}</span>
                        </td>
                        <td class="text-right">
                            {!! Form::hidden('minimal_produk[]', $product->pivot->minimal_produk) !!}
                            <span>{{ $product->pivot->minimal_produk }}</span>
                        </td>
                        <td class="text-right">
                            {!! Form::hidden('maksimal_produk[]', $product->pivot->maksimal_produk) !!}
                            <span>{{ $product->pivot->maksimal_produk }}</span>
                        </td>
                        <td class="text-right">
                            {!! Form::hidden('diskon_harga[]', $product->pivot->diskon_harga) !!}
                            <span>{{ rp($product->pivot->diskon_harga) }}</span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@include('admin.discounts.field_js')