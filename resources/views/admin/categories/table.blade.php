<table class="table table-hover table-borderless table-striped" id="categories-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ ($categories->currentPage() - 1) * $categories->count() + $loop->iteration }}</td>
                <td>{{ $category->nama }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.categories.destroy', $category], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-default btn-sm">
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
