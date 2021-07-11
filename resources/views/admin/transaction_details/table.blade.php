<div class="table-responsive">
    <table class="table" id="transactionDetails-table">
        <thead>
            <tr>
                <th>Subtotal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactionDetails as $transactionDetail)
            <tr>
                <td>{{ $transactionDetail->subtotal }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.transaction_details.destroy', $transactionDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.transaction_details.show', [$transactionDetail->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.transaction_details.edit', [$transactionDetail->id]) }}" class='btn btn-default btn-sm'>
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
</div>
