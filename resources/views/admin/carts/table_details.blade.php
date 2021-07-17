<table class="table table-sm table-borderless table-striped" id="cart_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom">#</th>
            <th class="py-2 border-bottom">Nama Produk</th>
            <th class="py-2 border-bottom">Warna</th>
            <th class="py-2 border-bottom">Ukuran</th>
            <th class="py-2 border-bottom">Harga</th>
            <th class="py-2 border-bottom">Jumlah</th>
            <th class="py-2 border-bottom">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartDetails as $cartDetail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cartDetail->product->nama }}</td>
                <td>{{ $cartDetail->color->name }}</td>
                <td>{{ optional($cartDetail->size)->name }} / {{ optional($cartDetail->dimension)->name }}</td>
                <td class="d-flex justify-content-between align-items-baseline">
                    <span>Rp.</span>
                    <span>
                    {{ $cart->user->hasRole('reseller')
                        ? number_format($cartDetail->product->harga_reseller, 2, ',', '.')
                        : number_format($cartDetail->product->harga_customer, 2, ',', '.') }}
                    </span>
                </td>
                <td class="text-center">x{{ $cartDetail->jumlah }}</td>
                <td class="d-flex justify-content-between align-items-baseline">
                    <span>Rp.</span>
                    <span>{{ number_format($cartDetail->sub_total, 2, ',', '.') }}</span>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="5"></th>
        <th class="py-2 border-top">Total</th>
        <th class="py-2 border-top d-flex justify-content-between align-items-baseline">
            <span>Rp.</span>
            <span>{{ number_format($cart->total, 2, ',', '.') }}</span>
        </th>
    </tfoot>
</table>
