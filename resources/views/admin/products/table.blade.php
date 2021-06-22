<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga Customer / Reseller</th>
                <th>Warna</th>
                <th>Size / Dimensi</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->category->nama ?? '' }}</td>
                <td>{{ $product->harga_customer }} / {{ $product->harga_reseller }}</td>
                <td>
                    @foreach ($product->productStocks as $stock)
                        <span class="badge badge-secondary mr-1">{{ $stock->warna }}</span>
                    @endforeach
                </td>
                <td>
                    @foreach ($product->productStocks as $stock)
                        {{ $stock->size->unique ?? '' }}
                    @endforeach
                    /
                    @foreach ($product->productStocks as $stock)
                        {{ $stock->dimensi->unique ?? '' }}
                    @endforeach
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.products.show', [$product->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.products.edit', [$product->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
