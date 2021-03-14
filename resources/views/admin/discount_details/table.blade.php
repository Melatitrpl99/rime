<div class="table-responsive">
    <table class="table" id="discountDetails-table">
        <thead>
            <tr>
                <th>Discount Id</th>
        <th>Product Id</th>
        <th>Diskon Harga</th>
        <th>Minimal Produk</th>
        <th>Maksimal Produk</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($discountDetails as $discountDetail)
            <tr>
                <td>{{ $discountDetail->discount_id }}</td>
            <td>{{ $discountDetail->product_id }}</td>
            <td>{{ $discountDetail->diskon_harga }}</td>
            <td>{{ $discountDetail->minimal_produk }}</td>
            <td>{{ $discountDetail->maksimal_produk }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.discountDetails.destroy', $discountDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.discountDetails.show', [$discountDetail->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.discountDetails.edit', [$discountDetail->id]) }}" class='btn btn-default btn-xs'>
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