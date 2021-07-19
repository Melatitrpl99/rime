<table class="table table-hover table-borderless table-striped" id="carts-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Total</th>
            <th>User</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($carts as $cart)
        <tr>
            <td>{{ $cart->nomor }}</td>
            <td><span class="d-inline-block text-truncate">{{ $cart->judul }}</span></td>
            <td><span class="d-inline block text-truncate">Rp. {{ number_format($cart->total, 2, ',', '.') }}</span></td>
            <td>{{ $cart->user->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.carts.destroy', $cart], 'method' => 'delete', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.carts.show', $cart) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.carts.edit', $cart) }}" class="btn btn-default btn-sm">
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
