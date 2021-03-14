<div class="table-responsive">
    <table class="table" id="transactions-table">
        <thead>
            <tr>
                <th>Nomor Transaksi</th>
        <th>Total</th>
        <th>User Id</th>
        <th>Slug</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->nomor_transaksi }}</td>
            <td>{{ $transaction->total }}</td>
            <td>{{ $transaction->user_id }}</td>
            <td>{{ $transaction->slug }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.transactions.show', [$transaction->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.transactions.edit', [$transaction->id]) }}" class='btn btn-default btn-xs'>
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
