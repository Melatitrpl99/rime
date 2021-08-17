<table class="table table-hover table-borderless table-striped" id="colors-table">
    <thead>
        <tr>
            <th>Name</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sizes as $size)
            <tr>
                <td>{{ $size->name }}</td>
                <td width="120">
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
