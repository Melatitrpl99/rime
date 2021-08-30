<table class="table table-hover table-borderless table-striped" id="reportCategories-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reportCategories as $reportCategory)
        <tr>
            <td>{{ ($reportCategories->currentPage() - 1) * $reportCategories->count() + $loop->iteration }}</td>
            <td>{{ $reportCategory->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.report_categories.destroy', $reportCategory], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.report_categories.show', [$reportCategory]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.report_categories.edit', [$reportCategory]) }}" class='btn btn-default btn-sm'>
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