<div class="table-responsive">
    <table class="table" id="transactionDetails-table">
        <thead>
            <tr>
                <th>Order Id</th>
        <th>Sub Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactionDetails as $transactionDetail)
            <tr>
                <td>{{ $transactionDetail->order_id }}</td>
            <td>{{ $transactionDetail->sub_total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['transactionDetails.destroy', $transactionDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('transactionDetails.show', [$transactionDetail->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('transactionDetails.edit', [$transactionDetail->id]) }}" class='btn btn-default btn-xs'>
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
