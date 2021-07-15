<table class="table table-hover table-borderless table-striped" id="transactions-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama customer</th>
            <th>Status user</th>
            {{-- <th>Produk</th> --}}
            {{-- <th>Sub total</th> --}}
            {{-- <th>Diskon</th> --}}
            <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->nomor }}</td>
                <td>{{ $transaction->created_at->format('d F Y') }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>
                    @foreach ($transaction->user->getRoleNames() as $role)
                        <span class="badge badge-secondary">{{ $role }}</span>
                    @endforeach
                </td>
                <td>Rp. {{ number_format($transaction->total, 2, ',', '.') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.transactions.show', [$transaction->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.transactions.edit', [$transaction->id]) }}" class='btn btn-default btn-sm'>
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
