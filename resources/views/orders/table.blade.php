<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Nomor Order</th>
        <th>Status Order</th>
        <th>Pesan</th>
        <th>Kode Diskon</th>
        <th>Slug</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->nomor_order }}</td>
            <td>{{ $order->status_order }}</td>
            <td>{{ $order->pesan }}</td>
            <td>{{ $order->kode_diskon }}</td>
            <td>{{ $order->slug }}</td>
            <td>{{ $order->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('orders.edit', [$order->id]) }}" class='btn btn-default btn-xs'>
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
