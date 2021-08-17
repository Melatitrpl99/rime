<table class="table table-sm table-borderless table-striped" id="productStocks_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom" width="50">#</th>
            <th class="py-2 border-bottom">Warna</th>
            <th class="py-2 border-bottom">Ukuran</th>
            <th class="py-2 border-bottom">Stok Ready</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product->productStocks as $stock)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $stock->color->name }}</td>
                <td>{{ $stock->size->name }}</td>
                <td>{{ numerify($stock->stok_ready) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th class="py-2 border-top" colspan="2"></th>
        <th class="py-2 border-top">Total</th>
        <th class="py-2 border-top">{{ numerify($product->productStocks->sum('stok_ready') ?? 0) }}</th>
    </tfoot>
</table>
