<table class="table table-sm table-borderless table-striped" id="cart_detail-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th class="py-2 border-bottom" width="50">#</th>
            <th class="py-2 border-bottom">Varian produk</th>
            <th class="py-2 border-bottom text-right" width="150">Harga</th>
            <th class="py-2 border-bottom text-right" width="100">Jumlah</th>
            <th class="py-2 border-bottom text-right" width="180">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cart->products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama }} + warna {{ $product->pivot->color->name }} + ukuran {{ $product->pivot->size->name }}</td>
                <td class="text-right">
                    {{ $cart->user->hasRole('reseller') ? rp($product->harga_reseller) : rp($product->harga_customer) }}
                </td>
                <td class="text-right">{{ $product->pivot->jumlah }}</td>
                <td class="text-right">
                    {{ rp($product->pivot->sub_total) }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="2"></th>
        <th class="py-2 border-top text-right">Total</th>
        <th class="py-2 border-top text-right">{{ $cart->products->sum('pivot.jumlah') }}</th>
        <th class="py-2 border-top text-right">
            {{ rp($cart->total) }}
        </th>
    </tfoot>
</table>
