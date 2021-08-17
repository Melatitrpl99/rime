<table class="table table-hover table-borderless table-striped" id="transactions-table">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Order</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->nomor }}</td>
            <td>{{ $transaction->created_at->format('d F Y') }}</td>
            <td>{{ rp($transaction->total) }}</td>
            <td>{{ $transaction->order->nomor }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.transactions.destroy', $transaction], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.transactions.show', $transaction) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.transactions.edit', $transaction) }}" class="btn btn-default btn-sm">
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