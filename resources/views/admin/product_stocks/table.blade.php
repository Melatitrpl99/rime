<table class="table table-hover table-borderless table-striped" id="product_stocks-table">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Warna</th>
            <th>Ukuran</th>
            <th>Stok Ready</th>
            <th>Updated</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productStocks as $productStock)
            <tr>
                <td>{{ $productStock->product->nama }}</td>
                <td>{{ $productStock->color->name }}</td>
                <td>{{ optional($productStock->size)->name ?? optional($productStock->dimension)->name ?? '' }}</td>
                <td>{{ $productStock->stok_ready }}</td>
                <td>{{ $productStock->updated_at->format('d F Y H:m:s') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.product_stocks.destroy', $productStock], 'method' => 'delete']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.product_stocks.show', $productStock) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.product_stocks.edit', $productStock) }}" class="btn btn-default btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
