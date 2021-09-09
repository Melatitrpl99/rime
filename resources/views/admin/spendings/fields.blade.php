<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('spending_category_id', 'Kategori') !!}
    {!! Form::select('spending_category_id', $spendingCategoryItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12">
    {!! Form::label('deskripsi', 'Deskripsi') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<div class="col-12 mt-4 mb-2">
    <h4>Detail pengeluaran</h4>
</div>

<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('names', 'Nama') !!}
    {!! Form::text('names', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-12 col-sm-6 col-md-8">
    {!! Form::label('misc', 'Keterangan') !!}
    {!! Form::text('misc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('price', 'Harga satuan') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-12 col-sm-6 col-md-2">
    {!! Form::label('qty_mat', 'Jumlah') !!}
    {!! Form::number('qty_mat', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-12 col-sm-6 col-md-2">
    {!! Form::label('unit', '&nbsp;') !!}
    {!! Form::select('unit', $spendingUnitItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('subtotal', 'Sub Total') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<div class="col-12 mt-4 mb-2">
    <h4>Tambah stok produk</h4>
</div>

<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('product', 'Untuk produk') !!}
    {!! Form::select('product', $productItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<div class="form-group col-12 col-sm-6 col-md-3">
    {!! Form::label('color', 'Warna') !!}
    {!! Form::select('color', $colorItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<div class="form-group col-12 col-sm-6 col-md-3">
    {!! Form::label('size', 'Ukuran') !!}
    {!! Form::select('size', $sizeItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<div class="form-group col-12 col-sm-3 col-md-2">
    {!! Form::label('qty_prod', 'Jumlah stok') !!}
    {!! Form::number('qty_prod', null, ['class' => 'form-control']) !!}
</div>

<div class="col-12 mt-4 mb-2 d-flex justify-content-end align-items-center">
    <button type="button" id="add_row" class="btn btn-primary ml-2"><i class="fas fa-plus mr-sm-1"></i>
        <span class="d-none d-sm-inline">Tambah Data</span>
    </button>
    <button type="button" id="remove_row" class="btn btn-danger ml-2"><i class="fas fa-trash-alt mr-sm-1"></i>
        <span class="d-none d-sm-inline">Hapus Data</span>
    </button>
</div>

<div class="col-12 table-responsive p-0">
    <table class="table table-hover table-borderless">
        <thead>
            <tr class="border-bottom">
                <th width="40">#</th>
                <th>Nama</th>
                <th width="100" class="text-right">Jumlah</th>
                <th width="150" class="text-right">Subtotal</th>
                <th width="350">Untuk produk</th>
                <th width="100">Stok</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.spendings.edit')
                @foreach ($spending->products as $key => $product)
                    <tr id="row-{{ $loop->iteration }}" style="transform: rotate(0)">
                        <td class="py-0.5" style="z-index: 3; position: relative;">
                            {!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">
                                {{ $product->pivot->nama }}
                            </a>
                            {!! Form::hidden('nama[]', $product->pivot->nama) !!}
                            {!! Form::hidden('ket[]', $product->pivot->ket) !!}
                        </td>
                        <td class="text-right">
                            <span>{{ $product->pivot->jumlah_item . ' ' . $product->pivot->spendingUnit->name }}</span>
                            {!! Form::hidden('jumlah[]', $product->pivot->jumlah_item) !!}
                            {!! Form::hidden('spending_unit_id[]', $product->pivot->spending_unit_id) !!}
                        </td>
                        <td class="text-right">
                            <span>{{ rp($product->pivot->sub_total) }}</span>
                            {!! Form::hidden('harga_satuan[]', $product->pivot->harga_satuan) !!}
                        </td>
                        <td>
                            <span class="d-block mb-2">{{ $product->nama }}</span>
                            <span class="d-block">warna: {{ $product->pivot->color->name }}</span>
                            <span class="d-block">ukuran: {{ $product->pivot->size->name }}</span>
                            {!! Form::hidden('product_id[]', $product->id) !!}
                            {!! Form::hidden('color_id[]', $product->pivot->color_id) !!}
                            {!! Form::hidden('size_id[]', $product->pivot->size_id) !!}
                        </td>
                        <td>
                            <span>{{ $product->pivot->jumlah_stok }}</span>
                            {!! Form::hidden('jumlah_stok[]', $product->pivot->jumlah_stok) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>

@include('admin.spendings.field_js')
