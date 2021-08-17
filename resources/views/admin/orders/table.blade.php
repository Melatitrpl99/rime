<table class="table table-hover table-borderless table-striped" id="orders-table">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Total</th>
            {{-- <th>Diskon</th> --}}
            <th>Biaya Pengiriman</th>
            <th>Berat</th>
            <th>Status</th>
            <th>User</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->nomor }}</td>
            <td>{{ rp($order->total) }}</td>
            {{-- <td>{{ $order->diskon }}</td> --}}
            <td>{{ rp($order->biaya_pengiriman) }}</td>
            <td>{{ $order->berat > 1000 ? numerify($order->berat / 1000, true) . ' Kg' : numerify($order->berat) . ' gram' }}</td>
            <td>{{ $order->status->name }}</td>
            <td>{{ $order->user->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.orders.destroy', $order], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.orders.show', [$order]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.orders.edit', [$order]) }}" class='btn btn-default btn-sm'>
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