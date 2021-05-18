<div class="table-responsive">
    <table class="table" id="fileThumbs-table">
        <thead>
            <tr>
                <th>Path</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fileThumbs as $fileThumb)
            <tr>
                <td>{{ $fileThumb->path }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.fileThumbs.destroy', $fileThumb->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.fileThumbs.show', [$fileThumb->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.fileThumbs.edit', [$fileThumb->id]) }}" class='btn btn-default btn-xs'>
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
