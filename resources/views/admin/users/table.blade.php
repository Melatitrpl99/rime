<table class="table table-hover table-borderless table-striped" id="users-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->getRoleNames() as $role)
                        <span class="badge badge-secondary">{{ $role }}</span>
                    @endforeach
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.users.show', [$user->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.users.edit', [$user->id]) }}" class='btn btn-default btn-sm'>
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
