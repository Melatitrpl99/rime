<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4>{{ $order->nomor }}</h4>
            </div>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @include('admin.orders.show_fields')
        </div>
        <div class="card-body p-0 table-responsive">
            @include('admin.orders.table_details')
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4>{{ $order->nomor }}</h4>
            </div>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <!-- Pesan Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Pesan</div>
                <div class="col-12 col-md-9">{{ $order->pesan }}</div>
            </div>

            <!-- Total Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Total</div>
                <div class="col-12 col-md-9">{{ rp($order->total) }}</div>
            </div>

            <!-- Kode Diskon Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Kode Diskon</div>
                <div class="col-12 col-md-9">{{ $order->kode_diskon }}</div>
            </div>

            <!-- Biaya Pengiriman Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Biaya Pengiriman</div>
                <div class="col-12 col-md-9">{{ rp($order->biaya_pengiriman) }}</div>
            </div>

            <!-- Berat Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Berat</div>
                <div class="col-12 col-md-9">{{ $order->berat > 1000 ? numerify($order->berat / 1000, true) . ' Kg' : numerify($order->berat) . ' gram' }}</div>
            </div>

            <!-- Status Id Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Status</div>
                <div class="col-12 col-md-9">{{ $order->status->name }}</div>
            </div>

            <!-- Shipment Id Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Alamat pengiriman</div>
                <div class="col-12 col-md-9">{{ $order->shipment->alamat }}</div>
            </div>

            <!-- User Id Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Nama pelanggan</div>
                <div class="col-12 col-md-9">{{ $order->user->nama_lengkap }}</div>
            </div>

            <!-- Created At Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Created At</div>
                <div class="col-12 col-md-9">{{ $order->created_at->addHour(8)->format('d F Y H:m:s') }}</div>
            </div>

            <!-- Updated At Field -->
            <div class="form-group row">
                <div class="col-12 col-md-3 text-bold">Updated At</div>
                <div class="col-12 col-md-9">{{ $order->updated_at->addHour(8)->format('d F Y H:m:s') }}</div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4>Detail order</h4>
            </div>
            <div class="card-tools"></div>
        </div>
        <div class="card-body p-0 table-responsi">
            <table class="table table-sm table-borderless table-striped" id="order_detail-table" style="min-width: 1024px">
                <thead>
                    <tr>
                        <th class="py-2 border-bottom" width="50">#</th>
                        <th class="py-2 border-bottom">Varian produk</th>
                        <th class="py-2 border-bottom text-right" width="150">Harga</th>
                        <th class="py-2 border-bottom text-right" width="50">Jumlah</th>
                        <th class="py-2 border-bottom text-right" width="160">Subtotal</th>
                        <th class="py-2 border-bottom text-right" width="150">Diskon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->nama }} + warna {{ $product->pivot->color->name }} + ukuran {{ $product->pivot->size->name }}</td>
                            <td class="text-right">
                                {{ $order->user->hasRole('reseller') ? rp($product->harga_reseller) : rp($product->harga_customer) }}</td>
                            <td class="text-right">x {{ $product->pivot->jumlah }}</td>
                            <td class="text-right">{{ rp($product->pivot->sub_total) }}</td>
                            <td class="text-right">{{ rp($product->pivot->diskon ?? 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th class="py-2 border-top" colspan="2"></th>
                    <th class="py-2 border-top text-right">Total</th>
                    <th class="py-2 border-top text-right">{{ $order->products->sum('pivot.jumlah') }}</th>
                    <th class="py-2 border-top text-right">{{ rp($order->total) }}</th>
                    <th class="py-2 border-top text-right">{{ rp($order->products->sum('pivot.diskon') ?? 0) }}</th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
