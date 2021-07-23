<!-- Nomor Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('nomor', 'Nomor:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control','maxlength' => 16]) !!}
</div>

<!-- Total Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>
<div class="col-md-12">
    <div class="d-flex justify-content-between align-items center">
        <h4>Detail transaksi</h4>
        <div class="d-flex justify-content right align-items-center">
            <button type="button" id="add_row" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
            <button type="button" id="remove_row" class="btn btn-danger ml-2"><i class="fas fa-minus"></i> Hapus Data</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <tr class="border-bottom">
                <th>#</th>
                <th>order</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.carts.edit')
                @foreach ($transactions->orders as $orders)
                    <tr>
                        <td>{!! Form::checkbox('row_orders', '1', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>{!! Form::select('order_id[]', $orderItems, $order->id, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)']) !!}</td>
                            {!! Form::hidden('sub_total[]', $orders->pivot->sub_total) !!}
                            {!! Form::text('subtotal[]', 'Rp '.number_format($orders->pivot->sub_total, '2', ',', '.'), ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="border-top">
                <th colspan="5"></th>
                <th>Total</th>
                <th>
                    {!! Form::hidden('total', null, ['id' => 'total']) !!}
                    {!! Form::text('calc', Route::currentRouteName() == 'admin.carts.edit' ? 'Rp '.number_format($cart->total, '2', ',', '.') : '', ['class' => 'form-control-plaintext', 'readonly' => true, 'id' => 'calc']) !!}
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
<script>


    function addRow() {
        return `<tr>
                <td>{!! Form::checkbox('row_orders', '1', null, ['class' => 'form-control']) !!}
                </td>
                <td>{!! Form::select('order_id[]', $orderItems, 1, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)']) !!}</td>
                    {!! Form::hidden('sub_total[]', null) !!}
                    {!! Form::text('subtotal[]', null, ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                </td>
            </tr>`;
    }

    $('#add_row').on('click', function () {
        $('#form-body-recursive').append(addRow());
    });

    $('#remove_row').on('click', function (e) {
        var checkbox = $('input:checked[name=row_orders]');
        var parent = checkbox.parent().parent();
        parent.remove();
    });

    $('select#user_id').on('change', function () {
        var forms = document.querySelector('#form-body-recursive');
        var rows = forms.getElementsByTagName('tr');

        var subs = 0;
        for (let element of rows) {
            updateJumlah(element.children[5].children[0]);
            updateOrders(element.children[1].children[0]);
        }

        updateTotal();
    });

    function updateJumlah(el) {
        if (el.value < 1) {
            el.value = 1;
        }

        let td = el.parentElement;
        let tr = td.parentElement;

        let orders = tr.children[1].children[0];

        let subTotal = tr.lastElementChild.children;

        subTotal[0].value = role == "reseller" ? el.value * priceReseller(orders.value) : el.value * priceCustomer(product.value);
        subTotal[1].value = convertNumber(subTotal[0].value);

        updateTotal();
    }

    function updateOrders(el) {
        let td = el.parentElement;
        let tr = td.parentElement;

        let jumlah = tr.children[5].children[0];

        let subTotal = tr.lastElementChild.children;

        subTotal[0].value = role == "reseller" ? jumlah.value * priceReseller(el.value) : jumlah.value * priceCustomer(el.value);
        subTotal[1].value = convertNumber(subTotal[0].value);

        updateTotal();
    }

    function updateTotal() {
        let form = document.getElementById('form-body-recursive');
        let trs = form.children;
        let totalHarga = [];

        for (i = 0; i < trs.length; i++) {
            let subTotal = trs[i].lastElementChild.children[0];
            totalHarga[i] = parseInt(subTotal.value);
        }

        let total = document.getElementById('total');
        total.value = totalHarga.reduce((a, b) => {
            return a + b;
        }, 0);

        let calc = document.getElementById('calc');
        calc.value = convertNumber(total.value);
        // total.value = totalHarga;
    }

    function convertNumber(value) {
        return Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(value);
    }
</script>

@endpush
