<!-- Nomor Field -->
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
                <th>Order</th>
                <th>Total order</th>
                <th>Biaya pengiriman</th>
                <th>Diskon</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.transactions.edit')
                @foreach ($transactions->orders as $orders)
                    <tr>
                        <td>{!! Form::checkbox('row_orders', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::select('order_id[]', $orderItems, $order->id, ['class' => 'form-control custom-select', 'onchange' => 'updateOrder(this)', 'placeholder' => 'Pilih nomor order...']) !!}</td>
                        <td>
                            {!! Form::hidden('total_order[]', $order->total) !!}
                            {!! Form::text('totalorder[]', 'Rp '.number_format($order->total, '2', ',', '.'), ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                        </td>
                        <td>
                            {!! Form::hidden('biaya_pengiriman[]', $order->biaya_pengiriman) !!}
                            {!! Form::text('biayapengiriman[]', 'Rp '.number_format($order->biaya_pengiriman, '2', ',', '.'), ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                        </td>
                        <td>
                            {!! Form::hidden('total_diskon[]', $order->products_sum_diskon) !!}
                            {!! Form::text('totaldiskon[]', 'Rp '.number_format($order->pivot->sub_total, '2', ',', '.'), ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                        </td>
                        <td>
                            {!! Form::hidden('sub_total[]', $order->pivot->sub_total) !!}
                            {!! Form::text('subtotal[]', 'Rp '.number_format($order->pivot->sub_total, '2', ',', '.'), ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
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
                    {!! Form::text('calc', Route::currentRouteName() == 'admin.transactions.edit' ? 'Rp '.number_format($cart->total, '2', ',', '.') : '', ['class' => 'form-control-plaintext', 'readonly' => true, 'id' => 'calc']) !!}
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
<script>
    function addRow() {
        return `<tr>
                <td>{!! Form::checkbox('row_orders', '1', null, ['class' => 'form-control']) !!}</td>
                <td>{!! Form::select('order_id[]', $orderItems, null, ['class' => 'form-control custom-select', 'onchange' => 'updateOrder(this)', 'placeholder' => 'Pilih nomor order...']) !!}</td>
                <td>
                    {!! Form::hidden('total_order[]', null) !!}
                    {!! Form::text('totalorder[]', null, ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                </td>
                <td>
                    {!! Form::hidden('biaya_pengiriman[]', null) !!}
                    {!! Form::text('biayapengiriman[]', null, ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                </td>
                <td>
                    {!! Form::hidden('total_diskon[]', null) !!}
                    {!! Form::text('totaldiskon[]', null, ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
                </td>
                <td>
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
            updateOrder(element.children[1].children[0]);
        }

        updateTotal();
    });

    function totalOrder(orderId) {
        return {!! $totalOrderItems !!}[orderId];
    }

    function biayaPengiriman(orderId) {
        return {!! $biayaPengirimanItems !!}[orderId];
    }

    function diskon(orderId) {
        return {!! $diskonItems !!}[orderId];
    }

    function updateOrder(el) {
        let td = el.parentElement;
        let tr = td.parentElement;
        let total_order = tr.children[2].children;
        let biaya_pengiriman = tr.children[3].children;
        let diskon = tr.children[4].children;
        let sub_total = tr.children[5].children;

        console.log(sub_total);
        total_order[0].value = totalOrder(el.value);
        total_order[1].value = convertNumber(total_order[0].value);
        biaya_pengiriman[0].value = biayaPengiriman(el.value);
        biaya_pengiriman[1].value = convertNumber(biaya_pengiriman[0].value);
        diskon[0].value = Diskon(el.value);
        diskon[1].value = convertNumber(diskon[0].value);

        sub_total[0].value = parseInt(total_order[0].value) + parseInt(biaya_pengiriman[0].value) - parseInt(diskon[0].value) ;
        sub_total[1].value = convertNumber(sub_total[0].value);

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
