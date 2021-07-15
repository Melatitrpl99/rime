<table class="table table-hover table-borderless table-striped" id="categories-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($postCategories as $postCategory)
            <tr>
                <td>{{ $postCategory->name }}</td>
                <td>{{ Str::limit($postCategory->desc, 50, '...') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.post_categories.destroy', $postCategory], 'method' => 'delete']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.post_categories.show', $postCategory) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.post_categories.edit', $postCategory) }}" class="btn btn-default btn-sm">
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
