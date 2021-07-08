<div class="table-responsive">
    <table class="table" id="productSizes-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productSizes as $productSize)
            <tr>
                <td>{{ $productSize->id }}</td>
            <td>{{ $productSize->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.productSizes.destroy', $productSize->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.productSizes.show', [$productSize->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.productSizes.edit', [$productSize->id]) }}" class='btn btn-default btn-xs'>
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
