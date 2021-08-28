<table class="table table-hover table-borderless table-striped" id="colors-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th width="200">Nama</th>
            <th>Deskripsi</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($statuses as $status)
            <tr>
                <td>
                    {{ $statuses->perPage() * ($statuses->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $status->name }}</td>
                <td>{{ Str::limit($status->desc, 150, '...') }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.statuses.destroy', $status], 'method' => 'DELETE', 'class' => 'm-0']) !!}
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
