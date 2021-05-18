<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Pesan</th>
        <th>Kode Diskon</th>
        <th>Status Id</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->nomor }}</td>
            <td>{{ $order->pesan }}</td>
            <td>{{ $order->kode_diskon }}</td>
            <td>{{ $order->status_id }}</td>
            <td>{{ $order->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.orders.show', [$order->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.orders.edit', [$order->id]) }}" class='btn btn-default btn-xs'>
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
