<div class="table-responsive">
    <table class="table" id="carts-table">
        <thead>
            <tr>
                <th>Judul</th>
        <th>Deskripsi</th>
        <th>Slug</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carts as $carts)
            <tr>
                <td>{{ $carts->judul }}</td>
            <td>{{ $carts->deskripsi }}</td>
            <td>{{ $carts->slug }}</td>
            <td>{{ $carts->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carts.destroy', $carts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carts.show', [$carts->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carts.edit', [$carts->id]) }}" class='btn btn-default btn-xs'>
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
