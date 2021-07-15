<table class="table table-hover table borderless table-striped" id="dimensions-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dimensions as $dimension)
            <tr>
                <td>{{ ($dimensions->currentPage() - 1) * $dimensions->count() + $loop->iteration }}</td>
                <td>{{ $dimension->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.dimensions.destroy', $dimension], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.dimensions.show', $dimension) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.dimensions.edit', $dimension) }}" class="btn btn-default btn-sm">
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
