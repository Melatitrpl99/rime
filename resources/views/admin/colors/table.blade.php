<table class="table table-hover table-borderless table-striped" id="colors-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Name</th>
            <th>Hex RGB Value</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colors as $color)
            <tr>
                <td>
                    {{ $colors->perPage() * ($colors->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $color->name }}</td>
                <td>{{ $color->rgba_color }} <i class="fas fa-square ml-1" style="color: {{ $color->rgba_color }}"></i></td>
                <td>
                    {!! Form::open(['route' => ['admin.colors.destroy', $color], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.colors.show', $color) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.colors.edit', $color) }}" class="btn btn-default btn-sm">
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
