<div class="table-responsive">
    <table class="table" id="productDimensions-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productDimensions as $productDimension)
            <tr>
                <td>{{ $productDimension->id }}</td>
            <td>{{ $productDimension->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.productDimensions.destroy', $productDimension->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.productDimensions.show', [$productDimension->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.productDimensions.edit', [$productDimension->id]) }}" class='btn btn-default btn-xs'>
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
