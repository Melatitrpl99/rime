<div class="table-responsive">
    <table class="table" id="productStocks-table">
        <thead>
            <tr>
                <th>Product Id</th>
        <th>Stok</th>
        <th>Warna</th>
        <th>Size</th>
        <th>Dimensi</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productStocks as $productStock)
            <tr>
                <td>{{ $productStock->product_id }}</td>
            <td>{{ $productStock->stok }}</td>
            <td>{{ $productStock->warna }}</td>
            <td>{{ $productStock->size }}</td>
            <td>{{ $productStock->dimensi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.productStocks.destroy', $productStock->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.productStocks.show', [$productStock->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.productStocks.edit', [$productStock->id]) }}" class='btn btn-default btn-xs'>
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
