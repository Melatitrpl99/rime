<div class="table-responsive">
    <table class="table" id="productColors-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Name</th>
        <th>Rgba Color</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productColors as $productColor)
            <tr>
                <td>{{ $productColor->id }}</td>
            <td>{{ $productColor->name }}</td>
            <td>{{ $productColor->rgba_color }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.productColors.destroy', $productColor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.productColors.show', [$productColor->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.productColors.edit', [$productColor->id]) }}" class='btn btn-default btn-xs'>
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
