<div class="table-responsive">
    <table class="table" id="files-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Mime Type</th>
        <th>Format</th>
        <th>Path</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
            <td>{{ $file->mime_type }}</td>
            <td>{{ $file->format }}</td>
            <td>{{ $file->path }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.files.destroy', $file->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.files.show', [$file->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.files.edit', [$file->id]) }}" class='btn btn-default btn-xs'>
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
