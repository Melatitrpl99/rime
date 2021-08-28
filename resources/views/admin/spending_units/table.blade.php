<table class="table table-hover table-borderless table-striped" id="spendingUnits-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($spendingUnits as $spendingUnit)
        <tr>
            <td>{{ ($spendingUnits->currentPage() - 1) * $spendingUnits->count() + $loop->iteration }}</td>
            <td>{{ $spendingUnit->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.spending_units.destroy', $spendingUnit], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.spending_units.show', [$spendingUnit]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.spending_units.edit', [$spendingUnit]) }}" class='btn btn-default btn-sm'>
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