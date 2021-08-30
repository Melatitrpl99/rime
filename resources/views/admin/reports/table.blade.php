<table class="table table-hover table-borderless table-striped" id="reports-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul</th>
        <th>Deskripsi</th>
        <th>Is Import</th>
        <th>Slug</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reports as $report)
        <tr>
            <td>{{ ($reports->currentPage() - 1) * $reports->count() + $loop->iteration }}</td>
            <td>{{ $report->judul }}</td>
            <td>{{ $report->deskripsi }}</td>
            <td>{{ $report->is_import }}</td>
            <td>{{ $report->slug }}</td>
            <td>{{ $report->user_id }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.reports.destroy', $report], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.reports.show', [$report]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.reports.edit', [$report]) }}" class='btn btn-default btn-sm'>
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