<div class="table-responsive">
    <table class="table" id="reports-table">
        <thead>
            <tr>
                <th>Judul</th>
        <th>Deskripsi</th>
        <th>Is Import</th>
        <th>Detail Laporan</th>
        <th>Slug</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->judul }}</td>
            <td>{{ $report->deskripsi }}</td>
            <td>{{ $report->is_import }}</td>
            <td>{{ $report->detail_laporan }}</td>
            <td>{{ $report->slug }}</td>
            <td>{{ $report->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.reports.destroy', $report->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.reports.show', [$report->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.reports.edit', [$report->id]) }}" class='btn btn-default btn-xs'>
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
