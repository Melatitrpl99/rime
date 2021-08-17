<table class="table table-hover table-borderless table-striped" id="productCategories-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productCategories as $productCategory)
            <tr>
                <td>{{ $productCategory->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.product_categories.destroy', $productCategory], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.product_categories.show', [$productCategory]) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.product_categories.edit', [$productCategory]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
