<div class="table-responsive">
    <table class="table" id="files-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mime Type</th>
                <th>Format</th>
                <th>Size</th>
                <th>Path</th>
                <th>Url</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->mime_type }}</td>
                <td>{{ $file->format }}</td>
                <td>{{ $file->size }}</td>
                <td>{{ $file->path }}</td>
                <td>{{ $file->url }}</td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('admin.files.show', [$file->id]) }}" class='btn btn-default btn-sm'><i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.files.edit', [$file->id]) }}" class='btn btn-default btn-sm'><i class="far fa-edit"></i>
                        </a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
