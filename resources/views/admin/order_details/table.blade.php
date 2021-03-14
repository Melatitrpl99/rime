<div class="table-responsive">
    <table class="table" id="orderDetails-table">
        <thead>
            <tr>
                <th>Order Id</th>
        <th>Cart Id</th>
        <th>Subtotal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{ $orderDetail->order_id }}</td>
            <td>{{ $orderDetail->cart_id }}</td>
            <td>{{ $orderDetail->subtotal }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.orderDetails.destroy', $orderDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.orderDetails.show', [$orderDetail->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.orderDetails.edit', [$orderDetail->id]) }}" class='btn btn-default btn-xs'>
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
