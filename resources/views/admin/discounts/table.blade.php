<table class="table table-hover table-borderless table-striped" id="discounts-table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Kode</th>
            <th>Batas Pemakaian</th>
            <th>Waktu Mulai / Berakhir</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($discounts as $discount)
            <tr>
                <td>{{ $discount->judul }}</td>
                <td>{{ $discount->kode }}</td>
                <td>{{ $discount->batas_pemakaian }}x</td>
                <td>{{ $discount->waktu_mulai->format('d F Y H:m:s') }} / {{ $discount->waktu_berakhir->format('d F Y H:m:s') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.discounts.destroy', $discount], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.discounts.show', $discount) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.discounts.edit', $discount) }}" class="btn btn-default btn-sm">
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
