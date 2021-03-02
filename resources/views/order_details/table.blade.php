<div class="table-responsive">
    <table class="table" id="orderDetails-table">
        <thead>
            <tr>
                <th>Cart Id</th>
        <th>Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{ $orderDetail->cart_id }}</td>
            <td>{{ $orderDetail->total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['orderDetails.destroy', $orderDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orderDetails.show', [$orderDetail->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('orderDetails.edit', [$orderDetail->id]) }}" class='btn btn-default btn-xs'>
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
