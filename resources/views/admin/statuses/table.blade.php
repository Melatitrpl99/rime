<table class="table table-hover table-borderless table-striped" id="colors-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($statuses as $status)
            <tr>
                <td>{{ ($statuses->currentPage() - 1) * $statuses->count() + $loop->iteration }}</td>
                <td>{{ $status->name }}</td>
                <td>{{ Str::limit($status->desc, 100, '...') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.statuses.destroy', $status], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.statuses.show', $status) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.statuses.edit', $status) }}" class="btn btn-default btn-sm">
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
