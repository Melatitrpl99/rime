<table class="table table-hover table-borderless table-striped" id="paymentMethods-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paymentMethods as $paymentMethod)
        <tr>
            <td>{{ ($paymentMethods->currentPage() - 1) * $paymentMethods->count() + $loop->iteration }}</td>
            <td>{{ $paymentMethod->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.payment_methods.destroy', $paymentMethod], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.payment_methods.show', [$paymentMethod]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.payment_methods.edit', [$paymentMethod]) }}" class='btn btn-default btn-sm'>
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