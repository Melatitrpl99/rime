<div class="table-responsive">
    <table class="table" id="discountDetails-table">
        <thead>
            <tr>
                <th>Discount</th>
                <th>Product</th>
                <th>Diskon Harga</th>
                <th>Minimal Produk</th>
                <th>Maksimal Produk</th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach($discountDetails as $discountDetail)
            <tr>
                <td>{{ $discountDetail->discount->judul }}</td>
                <td>{{ $discountDetail->product->nama }}</td>
                <td>{{ $discountDetail->diskon_harga }}</td>
                <td>{{ $discountDetail->minimal_produk }}</td>
                <td>{{ $discountDetail->maksimal_produk }}</td>
                {{-- <td width="120">
                    {!! Form::open(['route' => ['admin.discount_details.destroy', $discountDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.discount_details.show', [$discountDetail->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.discount_details.edit', [$discountDetail->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
