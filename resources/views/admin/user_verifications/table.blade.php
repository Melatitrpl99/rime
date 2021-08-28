<table class="table table-hover table-borderless table-striped" id="userVerifications-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>User</th>
            <th>Result Token</th>
            <th>Similarity</th>
            <th>Accuracy</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($userVerifications as $userVerification)
        <tr>
            <td>{{ ($userVerifications->currentPage() - 1) * $userVerifications->perPage() + $loop->iteration }}</td>
            <td>{{ $userVerification->user->nama_lengkap }}</td>
            <td>{{ $userVerification->result_token }}</td>
            <td>{{ $userVerification->similarity }}</td>
            <td>{{ $userVerification->accuracy }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.user_verifications.destroy', $userVerification], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.user_verifications.show', [$userVerification]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.user_verifications.edit', [$userVerification]) }}" class='btn btn-default btn-sm'>
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