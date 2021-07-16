<table class="table table-hover table-borderless table-striped" id="spendings-table">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($spendings as $spending)
            <tr>
                <td>{{ $spending->nomor }}</td>
                <td>{{ $spending->tanggal->format('d F Y') }}</td>
                <td>{{ $spending->kategori }}</td>
                <td>{{ $spending->qty }}</td>
                <td>Rp. {{ number_format($spending->total, 2, ',', '.') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.spendings.destroy', $spending], 'method' => 'delete', 'class' => 'm-0']) !!}
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
