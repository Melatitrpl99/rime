@php
    $role = $transaction->order->user->hasRole('reseller');
@endphp
<table class="table table-sm table-borderless table-striped" id="transaction_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom" width="50">#</th>
            <th class="py-2 border-bottom">Varian produk</th>
            <th class="py-2 border-bottom" width="160">Harga</th>
            <th class="py-2 border-bottom" width="160">Jumlah</th>
            <th class="py-2 border-bottom" width="160">Diskon</th>
            <th class="py-2 border-bottom" width="160">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaction->order->products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama }}</td>
                <td>{{ $role ? rp($product->harga_reseller) : rp($product->harga_customer) }}</td>
                <td>{{ numerify($product->pivot->jumlah) }}</td>
                <td>{{ rp($product->pivot->diskon ?? 0) }}</td>
                <td>{{ rp($product->pivot->sub_total - $product->pivot->diskon ?? 0) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="4"></th>
        <th class="py-2 border-top">Total transaksi</th>
        <th class="py-2 border-top">
            {{ rp($transaction->total) }}
        </th>
    </tfoot>
</table>
