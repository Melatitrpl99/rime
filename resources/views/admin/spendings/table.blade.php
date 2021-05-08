<div class="table-responsive">
    <table class="table" id="spendings-table">
        <thead>
            <tr>
                <th>Tanggal</th>
        <th>Nomor</th>
        <th>Kategori</th>
        <th>Deskripsi</th>
        <th>Jumlah Barang</th>
        <th>Harga</th>
        <th>Biaya Tambahan</th>
        <th>Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($spendings as $spending)
            <tr>
                <td>{{ $spending->tanggal }}</td>
            <td>{{ $spending->nomor }}</td>
            <td>{{ $spending->kategori }}</td>
            <td>{{ $spending->deskripsi }}</td>
            <td>{{ $spending->jumlah_barang }}</td>
            <td>{{ $spending->sub_total }}</td>
            <td>{{ $spending->biaya_tambahan }}</td>
            <td>{{ $spending->total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.spendings.destroy', $spending->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.spendings.show', [$spending->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.spendings.edit', [$spending->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
