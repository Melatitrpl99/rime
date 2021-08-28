<table class="table table-hover table-borderless table-striped" id="discounts-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Judul</th>
            <th>Kode</th>
            <th class="text-center">Min. Pemakaian</th>
            <th>Waktu Mulai</th>
            <th>Waktu Berakhir</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($discounts as $discount)
            <tr>
                <td>
                    {{ $discounts->perPage() * ($discounts->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $discount->judul }}</td>
                <td>{{ $discount->kode }}</td>
                <td class="text-center">{{ $discount->batas_pemakaian }}x</td>
                <td>{{ $discount->waktu_mulai->addHour(8)->format('Y-m-d') }}</td>
                <td>{{ $discount->waktu_berakhir->addHour(8)->format('Y-m-d') }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.discounts.destroy', $discount], 'method' => 'DELETE', 'class' => 'm-0']) !!}
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
