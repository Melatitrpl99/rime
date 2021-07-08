<div class="table-responsive">
    <table class="table" id="carts-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
            <tr>
                <td>{{ $cart->nomor }}</td>
            <td>{{ $cart->judul }}</td>
            <td>{{ $cart->deskripsi }}</td>
            <td>{{ $cart->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.carts.destroy', $cart->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.carts.show', [$cart->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.carts.edit', [$cart->id]) }}" class='btn btn-default btn-xs'>
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
