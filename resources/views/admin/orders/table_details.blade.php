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
            <tr style="transform: rotate(0)">
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
