<table class="table table-hover table-borderless table-striped" id="carts-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Judul</th>
            <th width="200">User</th>
            <th width="150" class="text-right">Total</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($carts as $cart)
        <tr>
            <td>
                {{ $carts->perPage() * ($carts->currentPage() - 1) + $loop->iteration }}
            </td>
            <td>{{ $cart->judul }}</td>
            <td>{{ $cart->user->nama_lengkap }}</td>
            <td class="text-right">{{ rp($cart->total) }}</td>
            <td>
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
