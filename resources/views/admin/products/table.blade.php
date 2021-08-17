<table class="table table-hover table-borderless table-striped" id="products-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th width="150" class="text-right">Harga Customer</th>
            <th width="150" class="text-right">Harga Reseller</th>
            <th width="100" class="text-center">Stok ready</th>
            <th>Kategori</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->nama }}</td>
                <td class="text-right">{{ rp($product->harga_customer) }}</td>
                <td class="text-right">{{ rp($product->harga_reseller) }}</td>
                <td class="text-center">{{ numerify($product->product_stocks_sum_stok_ready) }}</td>
                <td>{{ $product->productCategory->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.products.destroy', $product], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-default btn-sm"><i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-default btn-sm"><i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
