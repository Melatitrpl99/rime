<div class="table-responsive">
    <table class="table table-sm" id="statuses-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Desc</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($statuses as $status)
            <tr>
                <td>{{ $status->name }}</td>
                <td>{{ $status->desc }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.statuses.destroy', $status->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.statuses.show', [$status->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.statuses.edit', [$status->id]) }}" class='btn btn-default btn-sm'>
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
</div>
