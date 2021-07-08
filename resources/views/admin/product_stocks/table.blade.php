<div class="table-responsive">
    <table class="table" id="productStocks-table">
        <thead>
            <tr>
                <th>Product Id</th>
        <th>Colour Id</th>
        <th>Size Id</th>
        <th>Dimension Id</th>
        <th>Stok Ready</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productStocks as $productStock)
            <tr>
                <td>{{ $productStock->product_id }}</td>
            <td>{{ $productStock->colour_id }}</td>
            <td>{{ $productStock->size_id }}</td>
            <td>{{ $productStock->dimension_id }}</td>
            <td>{{ $productStock->stok_ready }}</td>
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
