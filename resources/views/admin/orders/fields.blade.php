<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Shipment Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_shipment_id', 'Alamat pengiriman') !!}
    {!! Form::select('user_shipment_id', array(), null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Pesan Field -->
<div class="form-group col-12">
    {!! Form::label('pesan', 'Pesan') !!}
    {!! Form::textarea('pesan', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('payment_method_id', 'Metode Pembayaran') !!}
    {!! Form::select('payment_method_id', $paymentMethodItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Diskon Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode_diskon', 'Diskon') !!}
    <div class="input-group">
        {!! Form::text('kode_diskon', null, ['class' => 'form-control']) !!}
        <div class="input-group-append">
            <button class="btn btn-info" type="button" id="cek_diskon">Cek diskon</button>
        </div>
    </div>
</div>

<!-- Biaya Pengiriman Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('biaya_pengiriman', 'Biaya Pengiriman') !!}
    {!! Form::number('biaya_pengiriman', null, ['class' => 'form-control']) !!}
</div>

<!-- Berat Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('berat', 'Berat') !!}
    {!! Form::number('berat', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Resi Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode_resi', 'Kode Resi') !!}
    {!! Form::text('kode_Resi', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('status_id', 'Status') !!}
    {!! Form::select('status_id', $statusItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Cart Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('cart_id', 'Keranjang') !!}
    <div class="input-group">
        {!! Form::select('cart_id', array(), null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih keranjang...']) !!}
        <div class="input-group-append">
            <button class="btn btn-outline-info" type="button" id="import_from_cart">
                <i class="fas fa-cart-arrow-down mr-1"></i> Impor
            </button>
        </div>
    </div>
</div>

<div class="col-12 mt-4 mb-2 ">
    <h4>Detail Order</h4>
</div>

<div class="col-12 col-sm-6 col-md-4">
    {!! Form::label('products', 'Produk:') !!}
    {!! Form::select('products', $productItems, null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih produk...', 'style' => 'width: 100%']) !!}
</div>

<div class="col-12 col-sm-6 col-md-3">
    {!! Form::label('colors', 'Warna:') !!}
    {!! Form::select('colors', $colorItems, null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih warna...', 'style' => 'width: 100%']) !!}
</div>

<div class="col-12 col-sm-6 col-md-3">
    {!! Form::label('sizes', 'Ukuran:') !!}
    {!! Form::select('sizes', $sizeItems, null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih ukuran...', 'style' => 'width: 100%']) !!}
</div>

<div class="col-12 col-sm-6 col-md-2">
    {!! Form::label('jmlh', 'Jumlah:') !!}
    {!! Form::number('jmlh', null, ['class' => 'form-control', 'min' => 1]) !!}
</div>

<div class="mt-4 mb-2 col-12 d-flex justify-content-end align-items-center">
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
    <table class="table table-borderless table-hover" style="min-width: 1024px">
        <thead>
            <tr class="border-bottom">
                <th width="40">#</th>
                <th>Produk</th>
                <th width="150">Warna</th>
                <th width="150">Size</th>
                <th width="150" class="text-right">Harga</th>
                <th width="75" class="text-right">Jumlah</th>
                <th width="150" class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive" style="min-width: 1024px">
            @if (Route::currentRouteName() == 'admin.orders.edit')
                @foreach ($order->products as $product)
                    <tr style="transform: rotate(0)" id="row-{{ $loop->iteration }}">
                        <td class="py-0.5" style="z-index: 3; position: relative;">{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>
                            {!! Form::hidden('product_id[]', $product->id) !!}
                            <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">{{ $product->nama }}</a>
                            <i class="fas fa-pencil-alt fa-xs ml-1 text-info"></i>
                        </td>
                        <td>
                            {!! Form::hidden('color_id[]', $product->pivot->color_id) !!}
                            <span>{{ $product->pivot->color->name }}</span>
                        </td>
                        <td>
                            {!! Form::hidden('size_id[]', $product->pivot->size_id) !!}
                            <span>{{ $product->pivot->size->name }}</span>
                        </td>
                        <td class="text-right">
                            {!! Form::hidden('harga[]', $order->user->hasRole('reseller') ? $product->harga_reseller : $product->harga_customer) !!}
                            <span>{{ rp($order->user->hasRole('reseller') ? $product->harga_reseller : $product->harga_customer) }}</span>
                        </td>
                        <td class="text-right">
                            {!! Form::hidden('jumlah[]', $product->pivot->jumlah) !!}
                            <span>{{ numerify($product->pivot->jumlah) }}</span>
                        </td>
                        <td class="text-right">
                            {!! Form::hidden('sub_total[]', $product->pivot->sub_total) !!}
                            <span>{{ rp($product->pivot->sub_total) }}</span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="border-top">
                <th colspan="5"></th>
                <th class="text-right">Total</th>
                <th class="text-right">
                    {!! Form::hidden('total', null, ['id' => 'total']) !!}
                    <span id="calc">{{ Route::currentRouteName() == 'admin.orders.edit' ? rp($order->total) : ''}}</span>
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@include('admin.orders.field_js')