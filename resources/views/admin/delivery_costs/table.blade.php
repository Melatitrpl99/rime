<table class="table table-hover table-borderless table-striped" id="deliveryCosts-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
        <th>Harga</th>
        <th>Jarak</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($deliveryCosts as $deliveryCost)
        <tr>
            <td>{{ ($deliveryCosts->currentPage() - 1) * $deliveryCosts->count() + $loop->iteration }}</td>
            <td>{{ $deliveryCost->name }}</td>
            <td>{{ $deliveryCost->harga }}</td>
            <td>{{ $deliveryCost->jarak }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.delivery_costs.destroy', $deliveryCost], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.delivery_costs.show', [$deliveryCost]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.delivery_costs.edit', [$deliveryCost]) }}" class='btn btn-default btn-sm'>
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