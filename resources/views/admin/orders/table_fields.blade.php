<div class="col-12 mt-4 mb-2">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Detail Order</h4>
        <div class="ml-auto d-flex justify-content-end align-items-center">
            <button type="button" id="add_row" class="btn btn-primary ml-2"><i class="fas fa-plus mr-sm-1"></i>
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
                <th width="40">#</th>
                <th width="450">Produk</th>
                <th width="150">Warna</th>
                <th width="150">Size</th>
                <th width="50">Jumlah</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.orders.edit')
                @foreach ($order->products as $product)
                    <tr>
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::select('product_id[]', $productItems, $product->id, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)', 'placeholder' => 'Pilih produk...']) !!}</td>
                        <td>{!! Form::select('color_id[]', $colorItems, $product->pivot->color_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih warna...', 'onchange' => 'updateProductSize(this)']) !!}</td>
                        <td>{!! Form::select('size_id[]', $sizeItems, $product->pivot->size_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih ukuran...']) !!}</td>
                        <td>{!! Form::number('jumlah[]', $product->pivot->jumlah, ['class' => 'form-control', 'onchange' => 'updateJumlah(this)', 'min' => 1]) !!}</td>
                        <td>
                            {!! Form::hidden('sub_total[]', $product->pivot->sub_total) !!}
                            {!! Form::text('subtotal[]', rp($product->pivot->sub_total), ['class' => 'form-control-plaintext text-right', 'readonly' => true]) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="border-top">
                <th colspan="4"></th>
                <th>Total</th>
                <th>
                    {!! Form::hidden('total', null, ['id' => 'total']) !!}
                    {!! Form::text('calc', Route::currentRouteName() == 'admin.orders.edit' ? rp($order->total) : '', ['class' => 'form-control-plaintext text-right m-0 p-0 border-0', 'readonly' => true, 'id' => 'calc']) !!}
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
    <script>
        var role = null;
        var shipmentId = null;

        @php
        if (Route::currentRouteName() == 'admin.orders.edit') {
            echo 'shipmentId = ' . $order->shipment_id . ';';
        }
        @endphp

        function priceCustomer(productId) {
            return {!! $priceCustomer !!}[productId];
        }

        function priceReseller(productId) {
            return {!! $priceReseller !!}[productId];
        }

        function minimumReseller(productId) {
            return {!! $minimumReseller !!}[productId];
        }

        function userRoles(userId) {
            return {!! $userRoles !!}[userId];
        }

        $(document).ready(function () {
            let userId = $('#user_id').find(':selected').val();
            role = userRoles(userId);

            updateCart(userId);
            updateShippingAddress(userId);
        });

        function addRow() {
            return `<tr>
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::select('product_id[]', $productItems, null, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)', 'placeholder' => 'Pilih produk...']) !!}</td>
                        <td>{!! Form::select('color_id[]', $colorItems, null, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih warna...', 'onchange' => 'updateProductSize(this)']) !!}</td>
                        <td>{!! Form::select('size_id[]', $sizeItems, null, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih ukuran...']) !!}</td>
                        <td>{!! Form::number('jumlah[]', null, ['class' => 'form-control', 'onchange' => 'updateJumlah(this)', 'min' => 1]) !!}</td>
                        <td>
                            {!! Form::hidden('sub_total[]', null) !!}
                            {!! Form::text('subtotal[]', null, ['class' => 'form-control-plaintext text-right', 'readonly' => true]) !!}
                        </td>
                    </tr>`;
        }

        $('#add_row').on('click', function() {
            $('#form-body-recursive').append(addRow());
        });

        $('#remove_row').on('click', function(e) {
            var checkbox = $('input:checked[name=row_product]');
            var parent = checkbox.parent().parent();
            parent.remove();

            updateTotal();
        });

        $('#import_from_cart').on('click', function () {
            $.ajax({
                url: "{{ route('get_cart_detail') }}",
                type: 'get',
                data: {
                    cart_id: $('#cart_id').find(':selected').val()
                },
                success: function (response) {
                    $('#form-body-recursive').append(response);
                    updateTotal();
                },
                error: function (xhr) {

                }
            })
        });

        $('#user_id').on('select2:select', function(e) {
            let userId = $('#user_id').find(':selected').val();
            role = userRoles(userId);

            var forms = document.querySelector('#form-body-recursive');
            var rows = forms.getElementsByTagName('tr');

            for (let element of rows) {
                updateJumlah(element.children[4].children[0]);
                updateProduct(element.children[1].children[0]);
            }

            updateCart(userId);
            updateShippingAddress(userId);

            updateTotal();
        });

        function updateCart(userId) {
            $.ajax({
                url: "{{ route('get_cart') }}",
                type: 'get',
                data: {
                    user_id: parseInt(userId)
                },
                success: function (response) {
                    let cart = $('#cart_id');
                    cart.empty().trigger('change');
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value.judul, value.id, false, false);
                        cart.append(option).trigger('change');
                    }
                },
                error: function (xhr) {}
            });
        }

        function updateShippingAddress(userId) {
            $.ajax({
                url: "{{ route('get_shipping_address') }}",
                type: 'get',
                data: {
                    user_id: parseInt(userId)
                },
                success: function (response) {
                    let shipment = $('#shipment_id');
                    shipment.empty().trigger('change');
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value.alamat, value.id, shipmentId == value.id, shipmentId == value.id);
                        shipment.append(option).trigger('change');
                    }
                },
                error: function (xhr) {}
            });
        }

        function updateJumlah(el) {
            if (el.value < 1) {
                el.value = 1;
            }

            let td = el.parentElement;
            let tr = td.parentElement;

            let product = tr.children[1].children[0];

            let subTotal = tr.lastElementChild.children;

            if (role == "reseller" && parseInt(el.value) < minimumReseller(product.value)) {
                el.value = minimumReseller(product.value);
            }

            if (product.value != "") {
                subTotal[0].value = role == "reseller" ? el.value * priceReseller(product.value) : el.value * priceCustomer(product.value);
                subTotal[1].value = convertNumber(subTotal[0].value);
            } else {
                subTotal[0].value = null;
                subTotal[1].value = "";
            }

            updateTotal();
        }

        function updateProduct(el) {
            let td = el.parentElement;
            let tr = td.parentElement;

            let jumlah = tr.children[4].children[0];

            let subTotal = tr.lastElementChild.children;

            if (role == "reseller" && parseInt(jumlah.value) < minimumReseller(el.value)) {
                jumlah.value = minimumReseller(el.value);
            }

            if (el.value != "") {
                subTotal[0].value = role == "reseller" ? jumlah.value * priceReseller(el.value) : jumlah.value * priceCustomer(el.value);
                subTotal[1].value = convertNumber(subTotal[0].value);
            } else {
                subTotal[0].value = null;
                subTotal[1].value = "";
            }

            updateProductColor(el);
            updateProductSize(el);
            updateTotal();
        }

        function updateProductColor(el) {
            let td = el.parentElement;
            let tr = td.parentElement;

            let color = tr.children[2].children[0];

            $.ajax({
                url: "{{ route('stok.color') }}",
                type: 'get',
                data: {
                    product_id: parseInt(el.value)
                },
                success: function (response) {
                    color.length = 1;
                    let colors = JSON.parse(response);
                    for (let [key, value] of Object.entries(colors)) {
                        let option = document.createElement('option');
                        option.text = value;
                        option.value = key;
                        color.add(option);
                    }
                },
                error: function (xhr) {

                }
            });
        }

        function updateProductSize(el) {
            let td = el.parentElement;
            let tr = td.parentElement;

            let color = tr.children[2].children[0];
            let size = tr.children[3].children[0];

            $.ajax({
                url: "{{ route('stok.size') }}",
                type: 'get',
                data: {
                    product_id: parseInt(el.value),
                    color_id: parseInt(color.value)
                },
                success: function (response) {
                    size.length = 1;
                    let sizes = JSON.parse(response);
                    for (let [key, value] of Object.entries(sizes)) {
                        let option = document.createElement('option');
                        option.text = value;
                        option.value = key;
                        size.add(option);
                    }
                },
                error: function (xhr) {

                }
            });
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
        }

        function convertNumber(value) {
            return Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }
    </script>

@endpush