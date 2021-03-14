<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Deskripsi</th>
        <th>Stok</th>
        <th>Harga Customer</th>
        <th>Harga Reseller</th>
        <th>Grosir Minimum</th>
        <th>Warna</th>
        <th>Ukuran</th>
        <th>Slug</th>
        <th>Category Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->nama }}</td>
            <td>{{ $product->deskripsi }}</td>
            <td>{{ $product->stok }}</td>
            <td>{{ $product->harga_customer }}</td>
            <td>{{ $product->harga_reseller }}</td>
            <td>{{ $product->grosir_minimum }}</td>
            <td>{{ $product->warna }}</td>
            <td>{{ $product->ukuran }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->category_id }}</td>
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