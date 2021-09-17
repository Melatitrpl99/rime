<table class="table table-hover table-borderless table-striped" id="verificationStatuses-table">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Name</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($verificationStatuses as $verificationStatus)
        <tr>
            <td>{{ ($verificationStatuses->currentPage() - 1) * $verificationStatuses->count() + $loop->iteration }}</td>
            <td>{{ $verificationStatus->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.verification_statuses.destroy', $verificationStatus], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.verification_statuses.show', $verificationStatus) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.verification_statuses.edit', $verificationStatus) }}" class="btn btn-default btn-sm">
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