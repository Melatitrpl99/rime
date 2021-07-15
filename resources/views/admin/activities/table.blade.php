<table class="table table-hover table-borderless table-striped" id="activities-table">
    <thead>
        <tr>
            <th>#</th>
            <th>User Agent</th>
            <th>IP Address</th>
            <th>Log</th>
            <th>Created at</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($activities as $activity)
        <tr>
            <td>{{ ($activities->currentPage() - 1) * $activities->count() + $loop->iteration }}</td>
            <td>{{ Str::limit($activity->user_agent, 25, '...') }}</td>
            <td>{{ $activity->ip_address }}</td>
            <td>{{ Str::limit($activity->log, 50, '...') }}</td>
            <td>{{ $activity->created_at->format('Y-m-d H:m:s') }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.activities.destroy', $activity], 'method' => 'delete', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.activities.show', $activity) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.activities.edit', $activity) }}" class="btn btn-default btn-sm">
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
