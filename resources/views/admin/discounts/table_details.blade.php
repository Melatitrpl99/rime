<table class="table table-sm table-borderless table-striped" id="discount_detail-table">
    <thead>
        <tr>
            <th class="py-2 border-bottom" width="50">#</th>
            <th class="py-2 border-bottom">Produk</th>
            <th class="py-2 border-bottom text-center" width="60">Min</th>
            <th class="py-2 border-bottom text-center" width="60">Max</th>
            <th class="py-2 border-bottom text-right" width="150">Diskon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($discount->products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama }}</td>
                <td class="text-center">{{ $product->pivot->minimal_produk }}</td>
                <td class="text-center">{{ $product->pivot->maksimal_produk }}</td>
                <td class="text-right">{{ rp($product->pivot->diskon_harga) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
