<table class="table table-hover table-borderless table-striped" id="spendings-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th width="150" class="text-right">Total</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($spendings as $spending)
            <tr>
                <td>
                    {{ $spendings->perPage() * ($spendings->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $spending->nomor }}</td>
                <td>{{ $spending->judul }}</td>
                <td>{{ $spending->spendingCategory->name }}</td>
                <td class="text-right">{{ rp($spending->total) }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.spendings.destroy', $spending], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.spendings.show', $spending) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.spendings.edit', $spending) }}" class="btn btn-default btn-sm">
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
