<div class="table-responsive">
    <table class="table" id="cartDetails-table">
        <thead>
            <tr>
                <th>Cart</th>
                <th>Product</th>
                <th>Color</th>
                <th>Size/Dimensi</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach($cartDetails as $cartDetail)
        <tr>
                <td>{{ $cartDetail->cart->judul }}</td>
                <td>{{ $cartDetail->product->nama }}</td>
                <td>{{ $cartDetail->color->name }}</td>
                <td>{{ optional($cartDetail->size)->name ?? optional($cartDetail->dimension)->name }}</td>
                <td>{{ $cartDetail->jumlah }}</td>
                <td>{{ $cartDetail->subtotal }}</td>
                {{-- <td width="120">
                    {!! Form::open(['route' => ['admin.cart_details.destroy', $cartDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.cart_details.show', [$cartDetail->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.cart_details.edit', [$cartDetail->id]) }}" class='btn btn-default btn-sm'>
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
