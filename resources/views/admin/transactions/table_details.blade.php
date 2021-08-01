<table class="table table-sm table-borderless table-striped" id="cart_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom" width="50">#</th>
            <th class="py-2 border-bottom">Order</th>
            <th class="py-2 border-bottom" width="160">Subtotal</th>
            <th class="py-2 border-bottom" width="160">Biaya Pengiriman</th>
            <th class="py-2 border-bottom" width="160">Diskon</th>
            <th class="py-2 border-bottom" width="160">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaction->orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->nomor }}</td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($order->total, 2, ',', '.') }}</span>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($order->biaya_pengiriman, 2, ',', '.') }}</span>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($order->products->sum('pivot.diskon'), 2, ',', '.') }}</span>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-between align-items baseline">
                        <span>Rp.</span>
                        <span>{{ number_format($order->total + $order->biaya_pengiriman - $order->products->sum('pivot.diskon'), 2, ',', '.') }}</span>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="4"></th>
        <th class="py-2 border-top">Total transaksi</th>
        <th class="py-2 border-top d-flex justify-content-between align-items-baseline">
            <span>Rp.</span>
            <span>{{ number_format($transaction->total, 2, ',', '.') }}</span>
        </th>
    </tfoot>
</table>
