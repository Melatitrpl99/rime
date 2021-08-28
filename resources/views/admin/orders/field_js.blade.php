@include('layouts.plugins.select2')

@push('scripts')
    <script>
        var role = null;
        var shipmentId = null;

        @php
        if (Route::currentRouteName() == 'admin.orders.edit') {
            echo 'shipmentId = ' . $order->user_shipment_id . ';';
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

            getUserCart(userId);
            updateShippingAddress(userId);
        });

        function addRow(product, color, size, jumlah, subTotal) {
            return `<tr>
                        <td class="py-0.5"><input class="form-control" name="row_product" type="checkbox" value="1"></td>
                        <td>
                            <input name="product_id[]" type="hidden" value="${product.id}">
                            <span>${product.name}</span>
                        </td>
                        <td>
                            <input name="color_id[]" type="hidden" value="${color.id}">
                            <span>${color.name}</span>
                        </td>
                        <td>
                            <input name="size_id[]" type="hidden" value="${size.id}">
                            <span>${size.name}</span>
                        </td>
                        <td class="text-right">
                            <input name="harga" type="hidden" value="${product.harga}">
                            <span>${convertNumber(product.harga)}</span>
                        </td>
                        <td class="text-right">
                            <input name="jumlah[]" type="hidden" value="${jumlah}">
                            <span>${jumlah}</span>
                        </td>
                        <td class="text-right">
                            <input name="sub_total[]" type="hidden" value="${subTotal}">
                            <span>${convertNumber(subTotal)}</span>
                        </td>
                    </tr>`;
        }

        $('button#cek_diskon').on('click', function () {
            // $(this).attr('class', 'btn btn-info overlay dark')
            // $(this).prepend(`<i class="fas fa-spinner fa-spin mr-1"></i>`);
            if ($('#kode_diskon').val().length != 0) {
                showLoading($(this));
                $.ajax({
                    url: "{{ route('cek_diskon') }}",
                    type: 'get',
                    data: {
                        diskon: $('#kode_diskon').val()
                    },
                    success: function (response) {
                        if (response.exists) {
                            $('button#cek_diskon').attr('class', 'btn btn-success');
                            $('button#cek_diskon').html('<i class="fas fa-check mr-1"></i> Diskon ditemukan');
                        } else {
                            $('button#cek_diskon').attr('class', 'btn btn-danger');
                            $('button#cek_diskon').html('<i class="fas fa-times mr-1"></i> Diskon tidak ditemukan');
                        }
                    },
                    error: function (xhr) {
                    }
                });
            }
        });

        function showLoading() {
            $('button#cek_diskon').attr('class', 'btn btn-secondary');
            $('button#cek_diskon').html('<i class="fas fa-spinner fa-spin mr-1"></i> Tunggu sebentar...');
        }

        $('#add_row').on('click', function() {
            if ($('#jmlh').val() >= 1) {
                const product = {
                    id: $('#products').find(':selected').val(),
                    name: $('#products').find(':selected').html(),
                    get harga() {
                        return role == 'reseller' ? priceReseller(this.id) : priceCustomer(this.id);
                    }
                };

                const color = {
                    id: $('#colors').find(':selected').val(),
                    name: $('#colors').find(':selected').html()
                };

                const size = {
                    id: $('#sizes').find(':selected').val(),
                    name: $('#sizes').find(':selected').html()
                };

                const jumlah = document.querySelector('#jmlh').value;

                const subTotal = product.harga * jumlah;

                $('#form-body-recursive').append(addRow(product, color, size, jumlah, subTotal));

                updateTotal();
            }
        });

        $('#remove_row').on('click', function(e) {
            var checkbox = $('input:checked[name=row_product]');
            var parent = checkbox.parent().parent();
            parent.remove();

            updateTotal();
        });

        $('#import_from_cart').on('click', function () {
            $.ajax({
                url: "{{ route('get_cart_details') }}",
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
                updateUserRoleProductDetails(element);
            }

            getUserCart(userId);
            updateShippingAddress(userId);

            updateTotal();
        });

        function updateUserRoleProductDetails(element) {
            let produk = element.children[1].children[0];
            let productId = parseInt(produk.value);
            let colorId = parseInt(element.children[2].children[0].value);
            let sizeId = parseInt(element.children[3].children[0].value);
            let harga = element.children[4].children[0];
            let jumlah = element.children[5].children[0];
            let subTotal = element.lastElementChild.children[0];

            harga.value = role == "reseller"
                ? priceReseller(parseInt(produk.value))
                : priceCustomer(parseInt(produk.value));

            updateJumlah(parseInt(produk.value), colorId, sizeId, jumlah);

            subTotal.value = parseInt(harga.value) * parseInt(jumlah.value);

            harga.nextElementSibling.innerHTML = convertNumber(harga.value);
            jumlah.nextElementSibling.innerHTML = jumlah.value;
            subTotal.nextElementSibling.innerHTML = convertNumber(subTotal.value);
        }

        $('#products').on('select2:select', function(e) {
            let productId = $('#products').find(':selected').val();

            if (productId) {
                $('#colors').select2({
                    ajax: {
                        url: "{{ route('stok.color') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (param) {
                            return {
                                product_id: productId,
                            }
                        },
                        processResults: function (data) {
                            var output = { results: [] };

                            for (const [key, value] of Object.entries(data)) {
                                output.results.push({
                                    'id': `${key}`,
                                    'text': `${value}`
                                });
                            }

                            return output;
                        }
                    },
                    theme: 'bootstrap4'
                });
            }
        });

        $('#colors').on('select2:select', function (e) {
            let productId = $('#products').find(':selected').val();
            let colorId = $('#colors').find(':selected').val();
            let userId = $('#user_id').find(':selected').val();

            if (productId && colorId) {
                $('#sizes').select2({
                    ajax: {
                        url: "{{ route('stok.size') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (param) {
                            return {
                                product_id: productId,
                                color_id: colorId,
                                user_id: userId
                            }
                        },
                        processResults: function (data) {
                            var output = { results: [] };

                            for (const [key, value] of Object.entries(data)) {
                                output.results.push({
                                    'id': `${key}`,
                                    'text': `${value}`
                                });
                            }

                            return output;
                        }
                    },
                    theme: 'bootstrap4'
                });
            }
        });

        $('#jmlh').on('change', function (e) {
            let jumlah = document.querySelector('#jmlh');
            let qty = $('#jmlh').val();
            let product = parseInt($('#products').find(':selected').val());
            let userId = $('#user_id').find(':selected').val();

            updateJumlah(parseInt($('#products').find(':selected').val()),
                parseInt($('#colors').find(':selected').val()),
                parseInt($('#sizes').find(':selected').val()),
                jumlah);
        });

        function getUserCart(userId) {
            $.ajax({
                url: "{{ route('get_carts') }}",
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
                url: "{{ route('get_shipping_addresses') }}",
                type: 'get',
                data: {
                    user_id: parseInt(userId)
                },
                success: function (response) {
                    let shipment = $('#user_shipment_id');
                    shipment.empty().trigger('change');
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value.alamat, value.id, shipmentId == value.id, shipmentId == value.id);
                        shipment.append(option).trigger('change');
                    }
                },
                error: function (xhr) {}
            });
        }

        function updateJumlah(productId, colorId, sizeId, element) {
            $.ajax({
                url: "{{ route('stok.stok_ready') }}",
                type: 'GET',
                data: {
                    product_id: productId,
                    color_id: colorId,
                    size_id: sizeId,
                    user_id: $('#user_id').find(':selected').val()
                },
                success: function (response) {
                    let stok = JSON.parse(response);

                    if (element.value > stok["stok_ready"]) {
                        element.value = stok["stok_ready"];
                    }

                    if (role == "reseller" && parseInt(element.value) < minimumReseller(productId)) {
                        element.value = minimumReseller(productId);
                    }

                    if (role == "reseller" && stok["stok_ready"] < minimumReseller(productId)) {
                        element.value = -1;
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
            calc.innerHTML = convertNumber(total.value);
        }

        function convertNumber(value) {
            return Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }
    </script>
@endpush