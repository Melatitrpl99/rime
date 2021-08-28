<table class="table table-hover table-borderless table-striped" id="transactions-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Nomor</th>
            <th width="200">Tanggal</th>
            <th width="150" class="text-right">Total</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orderTransactions as $orderTransaction)
        <tr>
            <td>
                {{ $orderTransactions->perPage() * ($orderTransactions->currentPage() - 1) + $loop->iteration }}
            </td>
            <td>{{ $orderTransaction->nomor }}</td>
            <td>{{ $orderTransaction->created_at->format('d F Y') }}</td>
            <td class="text-right">{{ rp($orderTransaction->total) }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.order_transactions.destroy', $orderTransaction], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.order_transactions.show', $orderTransaction) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.order_transactions.edit', $orderTransaction) }}" class="btn btn-default btn-sm">
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