<table class="table table-hover table-borderless table-striped" id="carts-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th>Judul</th>
            <th width="150" class="text-center">Total</th>
            <th width="150" class="text-center">User</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($carts as $cart)
        <tr>
            <td>{{ $cart->judul }}</td>
            <td class="text-right">{{ rp($cart->total) }}</td>
            <td class="text-center">{{ $cart->user->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.carts.destroy', $cart], 'method' => 'DELETE', 'class' => 'm-0']) !!}
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
