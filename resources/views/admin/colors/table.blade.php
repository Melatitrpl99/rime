<div class="table-responsive">
    <table class="table table-hover text-nowrap" id="colors-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>rgba Color</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($colors as $color)
            <tr>
                <td>{{ $color->name }}</td>
                <td>{{ $color->rgba_color }} <i class="fas fa-square ml-1" style="color: {{ $color->rgba_color }}"></i></td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.colors.destroy', $color->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.colors.show', [$color->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.colors.edit', [$color->id]) }}" class='btn btn-default btn-sm'>
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
