<table class="table table-hover table-borderless table-striped" id="colors-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Transaction</th>
            <th>Order</th>
            <th>Sub Total</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($transactionDetails as $transactionDetail)
            <tr>
                <td>{{ ($transactionDetails->currentPage() - 1) * $transactionDetails->count() + $loop->iteration }}</td>
                <td>{{ $transactionDetail->transaction->nomor }}</td>
                <td>{{ $transactionDetail->order->nomor }}</td>
                <td>{{ $transactionDetail->sub_total }}</td>
                {{-- <td width="120">
                    {!! Form::open(['route' => ['admin.transaction_details.destroy', $transactionDetail], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.transaction_details.show', $transactionDetail) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.transaction_details.edit', $transactionDetail) }}" class="btn btn-default btn-sm">
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
