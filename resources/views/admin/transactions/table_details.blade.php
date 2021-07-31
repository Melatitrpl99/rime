<table class="table table-sm table-borderless table-striped" id="cart_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom">#</th>
            <th class="py-2 border-bottom">Varian produk</th>
            <th class="py-2 border-bottom">Harga</th>
            <th class="py-2 border-bottom">Jumlah</th>
            <th class="py-2 border-bottom">Diskon</th>
            <th class="py-2 border-bottom">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{ dd($order->user->hasRole('reseller')) }} --}}
        @foreach($order->products as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->nama }} + warna {{ $detail->pivot->color->name }} + size {{ optional($detail->pivot->size)->name ?? $detail->pivot->dimension->name }}</td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>
                        {{ $order->user->hasRole('reseller')
                            ? number_format($detail->harga_reseller, 2, ',', '.')
                            : number_format($detail->harga_customer, 2, ',', '.') }}
                        </span>
                    </div>
                </td>
                <td class="text-center">x{{ $detail->pivot->jumlah }}</td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($detail->pivot->diskon, 2, ',', '.') }}</span>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($detail->pivot->sub_total, 2, ',', '.') }}</span>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="4"></th>
        <th class="py-2 border-top">Total</th>
        <th class="py-2 border-top d-flex justify-content-between align-items-baseline">
            <span>Rp.</span>
            <span>{{ number_format($order->total, 2, ',', '.') }}</span>
        </th>
    </tfoot>
</table>
