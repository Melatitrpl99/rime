<table class="table table-hover table-borderless table-striped" id="productCategories-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Nama</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productCategories as $productCategory)
            <tr>
                <td>
                    {{ $productCategories->perPage() * ($productCategories->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $productCategory->name }}</td>
                <td>
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
