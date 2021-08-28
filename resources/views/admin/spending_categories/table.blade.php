<table class="table table-hover table-borderless table-striped" id="spendingCategories-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($spendingCategories as $spendingCategory)
        <tr>
            <td>{{ ($spendingCategories->currentPage() - 1) * $spendingCategories->count() + $loop->iteration }}</td>
            <td>{{ $spendingCategory->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.spending_categories.destroy', $spendingCategory], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.spending_categories.show', [$spendingCategory]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.spending_categories.edit', [$spendingCategory]) }}" class='btn btn-default btn-sm'>
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