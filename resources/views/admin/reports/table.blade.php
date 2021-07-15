<table class="table table-hover table-borderless table-striped" id="reports-table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Laporan Eskternal?</th>
            <th>Tgl. Publikasi</th>
            <th>User</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->judul }}</td>
                <td>{{ Str::limit($report->deskripsi, 50, '...') }}</td>
                <td>{!! $report->is_import ? 'Ya <i class="fas fa-check text-success"></i>' : 'Tidak <i class="fas fa-times text-danger"></i>' !!}</td>
                <td>{{ $report->created_at->format('d F Y') }}</td>
                <td>{{ $report->user->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.reports.destroy', $report], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.reports.show', $report) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.reports.edit', $report) }}" class="btn btn-default btn-sm">
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
