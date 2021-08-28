<table class="table table-hover table-borderless table-striped" id="users-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    {{ $users->perPage() * ($users->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $user->nama_lengkap }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->getRoleNames() as $role)
                        <span class="badge badge-primary">{{ $role }}</span>
                    @endforeach
                </td>
                <td>
                    {!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-default btn-sm"><i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-default btn-sm"><i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
