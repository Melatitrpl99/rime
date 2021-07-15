<table class="table table-hover table-borderless table-striped" id="cartDetails-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Order</th>
            <th>Product</th>
            <th>Color</th>
            <th>Size/Dimensi</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            {{-- <th colspan="3">Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{ ($orderDetails->currentPage() - 1) * $orderDetails->count() + $loop->iteration }}</td>
                <td>{{ $orderDetail->order->nomor }}</td>
                <td>{{ $orderDetail->product->nama }}</td>
                <td>{{ $orderDetail->color->name }}</td>
                <td>{{ optional($orderDetail->size)->name ?? optional($orderDetail->dimension)->name }}</td>
                <td>{{ $orderDetail->jumlah }}</td>
                <td>Rp. {{ number_format($orderDetail->sub_total, 2, ',', '.') }}</td>
                {{-- <td width="120">
                {!! Form::open(['route' => ['admin.cart_details.destroy', $cartDetail->id], 'method' => 'delete', 'class' => 'm-0']) !!}
                <div class='btn-group'>
                    <a href="{{ route('admin.cart_details.show', [$cartDetail->id]) }}" class='btn btn-default btn-sm'>
                <i class="far fa-eye"></i>
                </a>
                <a href="{{ route('admin.cart_details.edit', [$cartDetail->id]) }}" class='btn btn-default btn-sm'>
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
