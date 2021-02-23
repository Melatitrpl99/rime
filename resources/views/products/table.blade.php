<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Desc</th>
        <th>Stock</th>
        <th>Cust Price</th>
        <th>Reseller Price</th>
        <th>Reseller Factor</th>
        <th>Slug</th>
        <th>Colour</th>
        <th>Size</th>
        <th>Category Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
            <td>{{ $product->desc }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->cust_price }}</td>
            <td>{{ $product->reseller_price }}</td>
            <td>{{ $product->reseller_factor }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->colour }}</td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->category_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-default btn-xs'>
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
