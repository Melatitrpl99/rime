<table class="table table-hover table-borderless table-striped" id="colors-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Name</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sizes as $size)
            <tr>
                <td>
                    {{ $sizes->perPage() * ($sizes->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $size->name }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.sizes.destroy', $size], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.sizes.show', $size) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.sizes.edit', $size) }}" class="btn btn-default btn-sm">
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
