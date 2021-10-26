<table class="table table-hover table-borderless table-striped" id="orders-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Nomor</th>
            <th width="150" class="text-right">Total</th>
            <th width="150" class="text-right">Pengiriman</th>
            <th width="150">Status</th>
            <th width="120">User</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>
                {{ $orders->perPage() * ($orders->currentPage() - 1) + $loop->iteration }}
            </td>
            <td>{{ $order->nomor }}</td>
            <td class="text-right">{{ rp($order->total) }}</td>
            <td class="text-right">{{ rp($order->biaya_pengiriman) }}</td>
            <td>{{ $order->status->name }}</td>
            <td>{{ $order->user->nama_lengkap }}</td>
            <td>
                {!! Form::open(['route' => ['admin.orders.destroy', $order], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.orders.edit', $order) }}" class='btn btn-default btn-sm'>
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