@include('admin._layouts.plugins.select2')

@push('scripts')
    <script>
        var role = null;
        var shipmentId = null;
        var onUpdate = null;
        var rowCount = 0;
        var selectedRow = null;

        @if (Route::currentRouteName() == 'admin.orders.edit')
            shipmentId = {{ $order->user_shipment_id }};
        @endif

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

        $(document).ready(function() {
            let userId = $('#user_id').find(':selected').val();
            role = userRoles(userId);

            getUserCart(userId);
            updateShippingAddress(userId);

            let form = document.querySelector('#form-body-recursive');
            rowCount = form.children.length;
        });

        function addRow(product, color, size, jumlah, subTotal) {
            if (onUpdate) {
                return `<td class="py-0.5" style="z-index: 3; position: relative;">
                            <input class="form-control" name="row_product" type="checkbox" value="1">
                        </td>
                        <td>
                            <input name="product_id[]" type="hidden" value="${product.id}">
                            <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">${product.name}</a>
                            <i class="fas fa-pencil-alt fa-xs ml-1 text-info"></i>
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
                        </td>`;
            }
            rowCount++;
            return `<tr style="transform: rotate(0)" id="row-${rowCount}">
                        <td class="py-0.5" style="z-index: 3; position: relative;">
                            <input class="form-control" name="row_product" type="checkbox" value="1">
                        </td>
                        <td>
                            <input name="product_id[]" type="hidden" value="${product.id}">
                            <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">${product.name}</a>
                            <i class="fas fa-pencil-alt fa-xs ml-1 text-info"></i>
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

        $('button#cek_diskon').on('click', function() {
            if ($('#kode_diskon').val().length != 0) {
                showLoading($(this));
                $.ajax({
                    url: "{{ route('cek_diskon') }}",
                    type: 'get',
                    data: {
                        diskon: $('#kode_diskon').val()
                    },
                    success: function(response) {
                        if (response.exists) {
                            $('button#cek_diskon').attr('class', 'btn btn-success');
                            $('button#cek_diskon').html('<i class="fas fa-check mr-1"></i> Diskon ditemukan');
                        } else {
                            $('button#cek_diskon').attr('class', 'btn btn-danger');
                            $('button#cek_diskon').html('<i class="fas fa-times mr-1"></i> Diskon tidak ditemukan');
                        }
                    },
                    error: function(xhr) {}
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

                if (onUpdate) {
                    $('#form-body-recursive tr#' + onUpdate).html(null);
                    $('#form-body-recursive tr#' + onUpdate).html(addRow(product, color, size, jumlah, subTotal));
                    onUpdate = null;

                    $('#add_row').html('<i class="fas fa-plus mr-sm-1"></i><span class="d-none d-sm-inline">Tambah Data</span>');
                } else {
                    $('#form-body-recursive').append(addRow(product, color, size, jumlah, subTotal));
                }

                updateTotal();
            }
        });

        $('#remove_row').on('click', function(e) {
            var checkbox = $('input:checked[name=row_product]');
            var parent = checkbox.parent().parent();
            parent.remove();

            let form = document.querySelector('#form-body-recursive');
            rowCount = form.children.length;
            let row = 1;
            for (let tr of form.children) {
                tr.id = row;
                row++;
            }

            updateTotal();
        });

        $('#import_from_cart').on('click', function() {
            $.ajax({
                url: "{{ route('get_cart_details') }}",
                type: 'get',
                data: {
                    cart_id: $('#cart_id').find(':selected').val()
                },
                success: function(response) {
                    console.log(response);
                    for (let data of response) {
                        const product = {
                            id: data.id,
                            name: data.nama,
                            get harga() {
                                return role == 'reseller' ? data.harga_reseller : data.harga_customer;
                            }
                        };
                        const color = data.pivot.color;
                        const size = data.pivot.size;
                        const jumlah = data.pivot.jumlah;
                        const subTotal = data.pivot.sub_total;

                        $('#form-body-recursive').append(addRow(product, color, size, jumlah, subTotal));
                    }
                    updateTotal();
                },
                error: function(xhr) {

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

        $('#products').on('select2:select', function(e) {
            let productId = $('#products').find(':selected').val();

            if (productId) {
                $('#colors').select2({
                    ajax: {
                        url: "{{ route('stok.color') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function(param) {
                            return {
                                product_id: productId,
                            }
                        },
                        processResults: function(data) {
                            var output = {
                                results: []
                            };

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

        $('#colors').on('select2:select', function(e) {
            let productId = $('#products').find(':selected').val();
            let colorId = $('#colors').find(':selected').val();
            let userId = $('#user_id').find(':selected').val();

            if (productId && colorId) {
                $('#sizes').select2({
                    ajax: {
                        url: "{{ route('stok.size') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function(param) {
                            return {
                                product_id: productId,
                                color_id: colorId,
                                user_id: userId
                            }
                        },
                        processResults: function(data) {
                            var output = {
                                results: []
                            };

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

        $('#jmlh').on('change', function(e) {
            let jumlah = document.querySelector('#jmlh');
            let qty = $('#jmlh').val();
            let product = parseInt($('#products').find(':selected').val());
            let userId = $('#user_id').find(':selected').val();

            updateJumlah(parseInt($('#products').find(':selected').val()),
                parseInt($('#colors').find(':selected').val()),
                parseInt($('#sizes').find(':selected').val()),
                jumlah);
        });

        function updateUserRoleProductDetails(element) {
            let produk = element.children[1].children[0];
            let productId = parseInt(produk.value);
            let colorId = parseInt(element.children[2].children[0].value);
            let sizeId = parseInt(element.children[3].children[0].value);
            let harga = element.children[4].children[0];
            let jumlah = element.children[5].children[0];
            let subTotal = element.lastElementChild.children[0];

            harga.value = role == "reseller" ?
                priceReseller(parseInt(produk.value)) :
                priceCustomer(parseInt(produk.value));

            updateJumlah(parseInt(produk.value), colorId, sizeId, jumlah);

            subTotal.value = parseInt(harga.value) * parseInt(jumlah.value);

            harga.nextElementSibling.innerHTML = convertNumber(harga.value);
            jumlah.nextElementSibling.innerHTML = jumlah.value;
            subTotal.nextElementSibling.innerHTML = convertNumber(subTotal.value);
        }

        function getUserCart(userId) {
            $.ajax({
                url: "{{ route('get_carts') }}",
                type: 'get',
                data: {
                    user_id: parseInt(userId)
                },
                success: function(response) {
                    let cart = $('#cart_id');
                    cart.empty().trigger('change');
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value.judul, value.id, false, false);
                        cart.append(option).trigger('change');
                    }
                },
                error: function(xhr) {}
            });
        }

        function updateShippingAddress(userId) {
            $.ajax({
                url: "{{ route('get_shipping_addresses') }}",
                type: 'get',
                data: {
                    user_id: parseInt(userId)
                },
                success: function(response) {
                    let shipment = $('#user_shipment_id');
                    shipment.empty().trigger('change');
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value.alamat, value.id, shipmentId == value.id, shipmentId == value.id);
                        shipment.append(option).trigger('change');
                    }
                },
                error: function(xhr) {}
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
                success: function(response) {
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
                error: function(xhr) {

                }
            });
        }

        function updateDetail(element) {
            let productTd = element.parentElement;
            let tr = productTd.parentElement;
            let form = tr.parentElement;

            if (selectedRow) {
                row = form.querySelector('#' + selectedRow);
                let cols = [].slice.call(row.children, 1);
                for (let col of cols) {
                    col.children[1].classList.remove('font-weight-bold');
                }
            }

            onUpdate = tr.id;

            console.log(onUpdate);

            productTd.children[1].classList.add('font-weight-bold');
            $('#products').val(productTd.children[0].value);
            $('#products').trigger('change');
            $('#products').trigger('select2:select');

            let colorTd = productTd.nextElementSibling;
            colorTd.children[1].classList.add('font-weight-bold');
            $('#colors').val(colorTd.children[0].value);
            $('#colors').trigger('change');
            $('#colors').trigger('select2:select');

            let sizeTd = colorTd.nextElementSibling;
            sizeTd.children[1].classList.add('font-weight-bold');
            sizeTd.nextElementSibling.children[1].classList.add('font-weight-bold');
            $('#sizes').val(sizeTd.children[0].value);
            $('#sizes').trigger('change');
            $('#sizes').trigger('select2:select');

            let jumlahTd = sizeTd.nextElementSibling.nextElementSibling;
            jumlahTd.children[1].classList.add('font-weight-bold');
            jumlahTd.nextElementSibling.children[1].classList.add('font-weight-bold');
            $('#jmlh').val(jumlahTd.children[0].value);

            selectedRow = tr.id;

            $('#add_row').html('<i class="fas fa-save mr-sm-1"></i><span class="d-none d-sm-inline">Simpan Perubahan</span>');
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
    </script>
@endpush
