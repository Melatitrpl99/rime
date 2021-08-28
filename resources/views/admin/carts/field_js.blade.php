@push('scripts')
    <script>
        var role = "";

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

        $('#user_id').on('select2:select', function(e) {
            userId = $('#user_id').find(':selected').val();
            role = userRoles(userId);

            var forms = document.querySelector('#form-body-recursive');
            var rows = forms.getElementsByTagName('tr');

            for (let element of rows) {
                let productId = element.children[1].children[0].value;

                let harga = element.children[4];
                harga.children[0].value = role == "reseller" ? priceReseller(productId) : priceCustomer(productId);
                harga.children[1].innerHTML = convertNumber(harga.children[0].value);

                let jumlah = element.children[5];
                if (role == "reseller" && parseInt(jumlah.children[0].value) < minimumReseller(productId)) {
                    jumlah.children[0].value = minimumReseller(productId);
                    jumlah.children[1].innerHTML = minimumReseller(productId);
                }

                let subTotal = element.lastElementChild;
                subTotal.children[0].value = parseInt(harga.children[0].value) * parseInt(jumlah.children[0].value);
                subTotal.children[1].innerHTML = convertNumber(subTotal.children[0].value);
            }

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

                            console.log(output);

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

                            console.log(output);

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

            $.ajax({
                url: "{{ route('stok.stok_ready') }}",
                type: 'GET',
                data: {
                    product_id: $('#products').find(':selected').val(),
                    color_id: $('#colors').find(':selected').val(),
                    size_id: $('#sizes').find(':selected').val(),
                    user_id: userId
                },
                success: function (response) {
                    let stok = JSON.parse(response);

                    if (jumlah.value > stok["stok_ready"]) {
                        jumlah.value = stok["stok_ready"];
                    }

                    if (role == "reseller" && parseInt(jumlah.value) < minimumReseller(product)) {
                        jumlah.value = minimumReseller(product);
                    }

                    if (role == "reseller" && stok["stok_ready"] < minimumReseller(product)) {
                        jumlah.value = -1;
                        $('#add_row').attr('disabled', 'disabled');
                    }
                },
                error: function (xhr) {

                }
            });
        });

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

@include('layouts.plugins.select2')