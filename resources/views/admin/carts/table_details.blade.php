<table class="table table-sm table-borderless table-striped" id="cart_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom">#</th>
            <th class="py-2 border-bottom">Varian produk</th>
            <th class="py-2 border-bottom">Harga</th>
            <th class="py-2 border-bottom text-center">Jumlah</th>
            <th class="py-2 border-bottom">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{ dd($cart->user->hasRole('reseller')) }} --}}
        @foreach($cart->products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama }} + warna {{ optional($product->pivot->color)->name }} ukuran {{ optional($product->pivot->size)->name ?? optional($product->pivot->dimension)->name }}</td>
                <td class="d-flex justify-content-between align-items-baseline">
                    <span>Rp.</span>
                    <span>
                    {{ $cart->user->hasRole('reseller')
                        ? number_format($product->harga_reseller, 2, ',', '.')
                        : number_format($product->harga_customer, 2, ',', '.') }}
                    </span>
                </td>
                <td class="text-center">x{{ $product->pivot->jumlah }}</td>
                <td class="d-flex justify-content-between align-items-baseline">
                    <span>Rp.</span>
                    <span>{{ number_format($product->pivot->sub_total, 2, ',', '.') }}</span>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="2"></th>
        <th class="py-2 border-top text-right">Total</th>
        <th class="py-2 border-top text-center">{{ $cart->products->sum('pivot.jumlah') }}</th>
        <th class="py-2 border-top d-flex justify-content-between align-items-baseline">
            <span>Rp.</span>
            <span>{{ number_format($cart->total, 2, ',', '.') }}</span>
        </th>
    </tfoot>
</table>
