<div class="table-responsive">
    <table class="table" id="discounts-table">
        <thead>
            <tr>
                <th>Judul</th>
        <th>Kode</th>
        <th>Batas Pemakaian</th>
        <th>Diskon Kategori</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($discounts as $discount)
            <tr>
                <td>{{ $discount->judul }}</td>
            <td>{{ $discount->kode }}</td>
            <td>{{ $discount->batas_pemakaian }}</td>
            <td>{{ $discount->diskon_kategori }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['discounts.destroy', $discount->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('discounts.show', [$discount->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('discounts.edit', [$discount->id]) }}" class='btn btn-default btn-xs'>
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
