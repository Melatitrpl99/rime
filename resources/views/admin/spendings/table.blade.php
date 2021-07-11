<div class="table-responsive">
    <table class="table" id="spendings-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Qty</th>
        <th>Sub Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($spendings as $spending)
            <tr>
                <td>{{ $spending->nomor }}</td>
            <td>{{ $spending->deskripsi }}</td>
            <td>{{ $spending->tanggal }}</td>
            <td>{{ $spending->kategori }}</td>
            <td>{{ $spending->qty }}</td>
            <td>{{ $spending->sub_total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.spendings.destroy', $spending->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.spendings.show', [$spending->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.spendings.edit', [$spending->id]) }}" class='btn btn-default btn-sm'>
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
