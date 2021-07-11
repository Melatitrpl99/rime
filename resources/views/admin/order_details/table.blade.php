<div class="table-responsive">
    <table class="table" id="orderDetails-table">
        <thead>
            <tr>
                <th>Colour Id</th>
                <th>Size Id</th>
                <th>Dimension Id</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order_details as $orderDetail)
            <tr>
                <td>{{ $orderDetail->colour_id }}</td>
                <td>{{ $orderDetail->size_id }}</td>
                <td>{{ $orderDetail->dimension_id }}</td>
                <td>{{ $orderDetail->jumlah }}</td>
                <td>{{ $orderDetail->subtotal }}</td>
                {{-- <td width="120">
                    {!! Form::open(['route' => ['admin.orderDetails.destroy', $orderDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.order_details.show', [$orderDetail->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.order_details.edit', [$orderDetail->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
