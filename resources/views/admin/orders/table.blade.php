<table class="table table-hover table-borderless table-striped" id="orders-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>User</th>
            <th>Total</th>
            <th>Tgl. Order</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->nomor }}</td>
                <td>{{ $order->user->name }}</td>
                <td>Rp. {{ number_format($order->total - $order->diskon + $order->biaya_pengiriman, 2, ',', '.') }}</td>
                <td>{{ $order->created_at->format('d F Y') }}</td>
                <td>{{ $order->status->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.orders.destroy', $order], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-default btn-sm">
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
