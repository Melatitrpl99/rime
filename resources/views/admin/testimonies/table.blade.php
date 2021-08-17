<table class="table table-hover table-borderless table-striped" id="testimonies-table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Review</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($testimonies as $testimony)
        <tr>
            <td>{{ $testimony->judul }}</td>
            <td>{{ $testimony->review }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.testimonies.destroy', $testimony], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.testimonies.show', [$testimony]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.testimonies.edit', [$testimony]) }}" class='btn btn-default btn-sm'>
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