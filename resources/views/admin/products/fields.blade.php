<!-- Nama Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12 ">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Harga Customer Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('harga_customer', 'Harga Customer:') !!}
    {!! Form::number('harga_customer', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Reseller Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('harga_reseller', 'Harga Reseller:') !!}
    {!! Form::number('harga_reseller', null, ['class' => 'form-control']) !!}
</div>

<!-- Reseller Minimum Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('reseller_minimum', 'Reseller Minimum:') !!}
    {!! Form::number('reseller_minimum', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Category Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('product_category_id', 'Kategori:') !!}
    {!! Form::select('product_category_id', $productCategoryItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-12 h-100">
    {!! Form::label('path[]', 'Upload foto produk :') !!}
    {!! Form::file('path[]', ['class' => 'fileupload', 'multiple' => true]) !!}
</div>

<div class="col-12 mt-4 mb-2">
    <h4>Stok produk</h4>
</div>

<div class="col-12 col-sm-6 col-md-4">
    {!! Form::label('colors', 'Warna:') !!}
    {!! Form::select('colors', $colorItems, null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih warna...', 'style' => 'width: 100%']) !!}
</div>

<div class="col-12 col-sm-6 col-md-4">
    {!! Form::label('sizes', 'Ukuran:') !!}
    {!! Form::select('sizes', $sizeItems, null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih ukuran...', 'style' => 'width: 100%']) !!}
</div>

<div class="col-12 col-sm-6 col-md-4">
    {!! Form::label('jmlh', 'Stok Ready:') !!}
    {!! Form::number('jmlh', null, ['class' => 'form-control', 'min' => 1]) !!}
</div>

<div class="col-12 mt-4 mb-2 d-flex justify-content-end align-items-center">
    <button type="button" id="add_row" class="btn btn-primary ml-2"><i class="fas fa-plus mr-sm-1"></i>
        <span class="d-none d-sm-inline">Tambah Data</span>
    </button>
    <button type="button" id="remove_row" class="btn btn-danger ml-2"><i class="fas fa-trash-alt mr-sm-1"></i>
        <span class="d-none d-sm-inline">Hapus Data</span>
    </button>
</div>

<div class="col-12 mt-4 table-responsive">
    <table class="table table-borderless" style="min-width: 540px">
        <thead>
            <tr class="border-bottom">
                <th width="40">#</th>
                <th>Warna</th>
                <th>Size</th>
                <th class="text-right">Stok ready</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.products.edit')
                @foreach ($product->productStocks as $productStock)
                    <tr>
                        <td class="py-0.5">{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>
                            {!! Form::hidden('color_id[]', $productStock->color_id) !!}
                            <span>{{ $productStock->color->name }}</span>
                        </td>
                        <td>
                            {!! Form::hidden('size_id[]', $productStock->size_id) !!}
                            <span>{{ $productStock->size->name }}</span>
                        </td>
                        <td class="text-right">
                            {!! Form::hidden('jumlah[]', $productStock->stok_ready) !!}
                            <span>{{ $productStock->stok_ready }}</span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="border-top">
                <th colspan="2"></th>
                <th class="text-right">Total</th>
                <th class="text-right">
                    {!! Form::hidden('total', Route::currentRouteName() == 'admin.products.edit' ? numerify($product->productStocks->sum('stok_ready')) : null, ['id' => 'total']) !!}
                    <span id="calc">{{ Route::currentRouteName() == 'admin.products.edit' ? $product->productStocks->sum('stok_ready') : '' }}</span>
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@include('admin.products.field_js')