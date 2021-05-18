<div class="table-responsive">
    <table class="table" id="spendingDetails-table">
        <thead>
            <tr>
                <th>Subtotal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($spendingDetails as $spendingDetail)
            <tr>
                <td>{{ $spendingDetail->subtotal }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.spendingDetails.destroy', $spendingDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.spendingDetails.show', [$spendingDetail->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.spendingDetails.edit', [$spendingDetail->id]) }}" class='btn btn-default btn-xs'>
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
