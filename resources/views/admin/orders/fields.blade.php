<!-- Pesan Field -->
<div class="form-group col-12 ">
    {!! Form::label('pesan', 'Pesan:') !!}
    {!! Form::textarea('pesan', null, ['class' => 'form-control']) !!}
</div>

<!-- Diskon Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode_diskon', 'Diskon:') !!}
    <div class="input-group">
        {!! Form::text('kode_diskon', null, ['class' => 'form-control']) !!}
        <div class="input-group-append">
            <button class="btn btn-info" type="button" id="cek_diskon">Cek diskon</button>
        </div>
    </div>
</div>

<!-- Biaya Pengiriman Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('biaya_pengiriman', 'Biaya Pengiriman:') !!}
    {!! Form::number('biaya_pengiriman', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', $statusItems, null, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih status order...']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select', 'onchange' => 'userRoles(this.value)', 'placeholder' => 'Pilih user...']) !!}
</div>

<div class="col-12 mt-4 mb-2">
    <div class="d-flex justify-content-between align-items center">
        <h4>Detail Order</h4>
        <div class="d-flex justify-content right align-items-center">
            <button type="button" id="add_row" class="btn btn-primary"><i class="fas fa-plus mr-sm-1"></i>
                <span class="d-none d-sm-inline">Tambah Data</span>
            </button>
            <button type="button" id="remove_row" class="btn btn-danger ml-2"><i class="fas fa-trash-alt mr-sm-1"></i>
                <span class="d-none d-sm-inline">Hapus Data</span>
            </button>
        </div>
    </div>
</div>

<div class="col-12 table-responsive">
    <table class="table table-borderless" style="min-width: 1024px">
        <thead>
            <tr class="border-bottom">
                <th>#</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Dimensi</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.orders.edit')
                @foreach ($order->products as $product)
                    <tr>
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>{!! Form::select('product_id[]', $productItems, $product->id, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)', 'placeholder' => 'Pilih produk...']) !!}</td>
                        <td>{!! Form::select('color_id[]', $colorItems, $product->pivot->color_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih warna...']) !!}</td>
                        <td>{!! Form::select('size_id[]', $sizeItems, $product->pivot->size_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih ukuran...']) !!}</td>
                        <td>{!! Form::select('dimension_id[]', $dimensionItems, $product->pivot->dimension_id, ['class' => 'form-control custom-select']) !!}</td>
                        <td>{!! Form::number('jumlah[]', $product->pivot->jumlah, ['class' => 'form-control', 'oninput' => 'updateJumlah(this)', 'min' => 1]) !!}</td>
                        <td>
                            {!! Form::hidden('sub_total[]', $product->pivot->sub_total) !!}
                            {!! Form::text('subtotal[]', 'Rp '.number_format($product->pivot->sub_total, '2', ',', '.'), ['class' => 'form-control-plaintext', 'readonly' => true]) !!}
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
                    {!! Form::text('calc', Route::currentRouteName() == 'admin.orders.edit' ? 'Rp '.number_format($order->total, '2', ',', '.') : '', ['class' => 'form-control-plaintext', 'readonly' => true, 'id' => 'calc']) !!}
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
<script>
    var role = "";

    function priceCustomer(productId) {
        return {!! $priceCustomer !!}[productId];
    }

    function priceReseller(productId) {
        return {!! $priceReseller !!}[productId];
    }

    function userRoles(userId) {
        role = {!! $userRoles !!}[userId];
    }

    function addRow() {
        return `<tr>
                    <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::select('product_id[]', $productItems, 1, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)']) !!}</td>
                    <td>{!! Form::select('color_id[]', $colorItems, null, ['class' => 'form-control custom-select']) !!}</td>
                    <td>{!! Form::select('size_id[]', $sizeItems, null, ['class' => 'form-control custom-select']) !!}</td>
                    <td>{!! Form::select('dimension_id[]', $dimensionItems, null, ['class' => 'form-control custom-select']) !!}</td>
                    <td>{!! Form::number('jumlah[]', 1, ['class' => 'form-control', 'min' => 1, 'oninput' => 'updateJumlah(this)']) !!}</td>
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
        var checkbox = $('input:checked[name=row_product]');
        var parent = checkbox.parent().parent();
        parent.remove();

        updateTotal();
    });

    $('select#user_id').on('change', function () {
        var forms = document.querySelector('#form-body-recursive');
        var rows = forms.getElementsByTagName('tr');

        var subs = 0;
        for (let element of rows) {
            updateJumlah(element.children[5].children[0]);
            updateProduct(element.children[1].children[0]);
        }

        updateTotal();
    });

    $('button#cek_diskon').on('click', function () {
        // $(this).attr('class', 'btn btn-info overlay dark')
        // $(this).prepend(`<i class="fas fa-spinner fa-spin mr-1"></i>`);
        showLoading($(this));
    });

    var loading = false;
    var checked = false;
    function showLoading() {
        loading = !loading;
        if (loading) {
            $('button#cek_diskon').attr('class', 'btn btn-secondary');
            $('button#cek_diskon').prepend(`<i class="fas fa-spinner fa-spin mr-1"></i>`);
            checkDiscount();
        } else {
            $('button#cek_diskon').attr('class', 'btn btn-info');
            $('button#cek_diskon i').remove();
        }
    }

    function checkDiscount() {
        let diskon = document.querySelector('#kode_diskon');
        console.log(diskon.value);
    }

    function updateJumlah(el) {
        if (el.value < 1) {
            el.value = 1;
        }

        let td = el.parentElement;
        let tr = td.parentElement;

        let product = tr.children[1].children[0];

        let subTotal = tr.lastElementChild.children;

        subTotal[0].value = role == "reseller" ? el.value * priceReseller(product.value) : el.value * priceCustomer(product.value);
        subTotal[1].value = convertNumber(subTotal[0].value);

        updateTotal();
    }

    function updateProduct(el) {
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
