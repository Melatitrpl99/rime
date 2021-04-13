<div class="table-responsive">
    <table class="table" id="cartDetails-table">
        <thead>
            <tr>
                <th>Cart Id</th>
                <th>Product Id</th>
                <th>Subtotal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartDetails as $cartDetail)
            <tr>
                <td>{{ $cartDetail->cart_id }}</td>
                <td>{{ $cartDetail->product_id }}</td>
                <td>{{ $cartDetail->subtotal }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.cartDetails.destroy', $cartDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.cartDetails.show', [$cartDetail->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.cartDetails.edit', [$cartDetail->id]) }}" class='btn btn-default btn-xs'>
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
