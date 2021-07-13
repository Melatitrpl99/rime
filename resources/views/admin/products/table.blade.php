<table class="table table-hover" id="products-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga Customer / Reseller</th>
            <th>Reseller Minimum</th>
            <th>Category</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->nama }}</td>
            <td>Rp. {{ number_format($product->harga_customer, 2, ',', '.') }} / Rp. {{ number_format($product->harga_reseller, 2, ',', '.') }}</td>
            <td>{{ $product->reseller_minimum }}</td>
            <td>{{ $product->category->nama }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('admin.products.show', [$product->id]) }}" class='btn btn-default btn-sm'><i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.products.edit', [$product->id]) }}" class='btn btn-default btn-sm'><i class="far fa-edit"></i>
                    </a>
                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
