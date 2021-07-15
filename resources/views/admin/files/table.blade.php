<table class="table table-hover table-borderless table-striped" id="files-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>MIME Type</th>
            <th>Format</th>
            <th>Size</th>
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
            <td>{{ $file->size }}</td>
            <td><a href="{{ $file->url }}">{{ $file->path }}</a></td>
            <td width="120">
                <div class="btn-group">
                    <a href="{{ route('admin.files.show', $file) }}" class="btn btn-default btn-sm"><i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.files.edit', $file) }}" class="btn btn-default btn-sm"><i class="far fa-edit"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
