<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12">
    <div class="d-flex justify-content-between align-items center">
        <h4>Detail Keranjang</h4>
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
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Dimensi</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.carts.edit')
                @foreach ($cart->products as $product)
                    <tr id="{{ $loop->iteration }}">
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>{!! Form::select('product_id[]', $productItems, $product->id, ['class' => 'form-control custom-select', 'onchange' => 'updateSubTotalProduct(this)']) !!}</td>
                        <td>{!! Form::select('color_id[]', $colorItems, $product->pivot->color_id, ['class' => 'form-control custom-select']) !!}</td>
                        <td>{!! Form::select('size_id[]', $sizeItems, $product->pivot->size_id, ['class' => 'form-control custom-select']) !!}</td>
                        <td>{!! Form::select('dimension_id[]', $dimensionItems, $product->pivot->size_id, ['class' => 'form-control custom-select']) !!}</td>
                        <td>{!! Form::number('jumlah[]', $product->pivot->jumlah, ['class' => 'form-control', 'oninput' => 'updateSubTotalJumlah(this)']) !!}</td>
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
                    {!! Form::text('calc', Route::currentRouteName() == 'admin.carts.edit' ? 'Rp '.number_format($cart->total, '2', ',', '.') : '', ['class' => 'form-control-plaintext', 'readonly' => true, 'id' => 'calc']) !!}
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
<script>
    // var doc = document.getElementById('form-body-recursive');
    //

    var data = 0;

    function priceCustomer(productId) {
        return {!! $priceCustomer !!}[productId];
    }

    function priceReseller(productId) {
        return {!! $priceReseller !!}[productId];
    }

    function addRow() {
        data++;
        return `<tr id="row-${data}">
                <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}
                </td>
                <td>{!! Form::select('product_id[]', $productItems, null, ['class' => 'form-control custom-select', 'onchange' => 'updateSubTotalProduct(this)']) !!}</td>
                <td>{!! Form::select('color_id[]', $colorItems, null, ['class' => 'form-control custom-select']) !!}</td>
                <td>{!! Form::select('size_id[]', $sizeItems, null, ['class' => 'form-control custom-select']) !!}</td>
                <td>{!! Form::select('dimension_id[]', $dimensionItems, null, ['class' => 'form-control custom-select']) !!}</td>
                <td>{!! Form::number('jumlah[]', null, ['class' => 'form-control', 'oninput' => 'updateSubTotalJumlah(this)']) !!}</td>
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
    });

    function updateSubTotalJumlah(el) {
        let td = el.parentElement;
        let tr = td.parentElement;

        let product = tr.children[1].children[0];

        let subTotal = tr.lastElementChild.children;
        subTotal[0].value = el.value * priceCustomer(product.value);
        subTotal[1].value = convertNumber(subTotal[0].value);

        updateTotal();
    }

    function updateSubTotalProduct(el) {
        let td = el.parentElement;
        let tr = td.parentElement;

        let product = tr.children[1].children[0];

        let subTotal = tr.lastElementChild.children;
        subTotal[0].value = el.value * priceCustomer(product.value);
        subTotal[1].value = convertNumber(subTotal[0].value);
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
