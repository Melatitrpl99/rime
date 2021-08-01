<table class="table table-sm table-borderless table-striped" id="cart_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom">#</th>
            <th class="py-2 border-bottom">Varian produk</th>
            <th class="py-2 border-bottom">Harga</th>
            <th class="py-2 border-bottom">Jumlah</th>
            <th class="py-2 border-bottom">Subtotal</th>
            <th class="py-2 border-bottom">Diskon</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama }} + warna {{ $product->pivot->color->name }} + size {{ optional($product->pivot->size)->name ?? $product->pivot->dimension->name }}</td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>
                        {{ $order->user->hasRole('reseller')
                            ? number_format($product->harga_reseller, 2, ',', '.')
                            : number_format($product->harga_customer, 2, ',', '.') }}
                        </span>
                    </div>
                </td>
                <td class="text-center">x{{ $product->pivot->jumlah }}</td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($product->pivot->sub_total, 2, ',', '.') }}</span>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($product->pivot->diskon, 2, ',', '.') }}</span>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="2"></th>
        <th class="py-2 border-top text-right">Total</th>
        <th class="py-2 border-top text-center">{{ $order->products->sum('pivot.jumlah') }}</th>
        <th class="py-2 border-top">
            <div class="d-flex justify-content-between align-items-baseline">
                <span>Rp.</span>
                <span>{{ number_format($order->total, 2, ',', '.') }}</span>
            </div>
        </th>
        <th class="py-2 border-top">
            <div class="d-flex justify-content-between align-items-baseline">
                <span>Rp.</span>
                <span>{{ number_format($order->products->sum('pivot.diskon'), 2, ',', '.') }}</span>
            </div>
        </th>
    </tfoot>
</table>
