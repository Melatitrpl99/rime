@include('layouts.plugins.select2')

@include('layouts.plugins.datetimepicker')

@once
    @push('scripts')
        <script>
            $(document).ready(function () {
                let userId = $('#user_id').find(':selected').val();

                $('#user_id').trigger('select2:select');
            });

            $('#tanggal_masuk').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: false
            });

            $('#user_id').on('select2:select', function(e) {
                let userId = $(this).find(':selected').val();

                $('#order_id').select2({
                    ajax: {
                        url: "{{ route('get_orders') }}",
                        dataType: 'json',
                        data: function(param) {
                            return {
                                @if(Route::currentRouteName() == 'admin.order_transactions.edit')
                                order_id: {{ $orderTransaction->order_id }},
                                @endif
                                user_id: userId,
                            }
                        },
                        processResults: function(response) {
                            let output = {
                                results: []
                            };

                            let orderId = -1;

                            @if (Route::currentRouteName() == 'admin.order_transactions.edit')
                                orderId = {{ $orderTransaction->order_id }};
                            @endif

                            for (const [key, value] of Object.entries(response)) {
                                output.results.push({
                                    'id': key,
                                    'text': value,
                                    'selected': key === orderId
                                });
                            }

                            console.log(output);

                            return output;
                        },
                    },
                    theme: 'bootstrap4'
                });
            });

            $('#order_id').on('select2:select', function(e) {
                $.ajax({
                    url: "{{ route('get_order_details') }}",
                    type: 'get',
                    data: {
                        order_id: $(this).find(':selected').val()
                    },
                    success: updateOrderDetails,
                    error: function(xhr) {}
                });
            });

            function updateOrderDetails(response) {
                let title = document.querySelector('#order_title');
                let status = document.querySelector('#order_status');
                let pesan = document.querySelector('#order_pesan');
                let biaya = document.querySelector('#order_biaya_pengiriman');
                let total = document.querySelector('#order_total');
                let kode = document.querySelector('#order_kode_diskon');
                let berat = document.querySelector('#order_berat');
                let alamat = document.querySelector('#order_alamat');
                let tableBody = document.querySelector('#order_details_tbody');
                let tableJumlah = document.querySelector('#order_details_jumlah');
                let tableSubTotal = document.querySelector('#order_details_total');
                let tableDiskon = document.querySelector('#order_details_diskon');
                let fieldTanggalMasuk = document.querySelector('#tanggal_masuk');
                let fieldTotal = document.querySelector('#total');
                let fieldDisplayTotal = document.querySelector('#displaytotal');

                tableBody.innerHTML = null;
                let tJumlah = 0;
                let tSubTotal = 0;
                let tDiskon = 0;
                for (let i = 0; i < response.products.length; i++) {
                    tableBody.innerHTML += addRow(i + 1, response.products[i]);
                    tJumlah += response.products[i].pivot.jumlah;
                    tSubTotal += response.products[i].pivot.sub_total;
                    tDiskon += response.products[i].pivot.diskon;
                }

                title.innerHTML = response.nomor;
                status.innerHTML = response.status.name;
                pesan.innerHTML = response.pesan;
                biaya.innerHTML = convertNumber(response.biaya_pengiriman);
                total.innerHTML = convertNumber(response.total);
                kode.innerHTML = response.discount.kode;
                berat.innerHTML = convertBerat(response.berat);
                alamat.innerHTML = response.user_shipment.alamat;

                tableJumlah.innerHTML = tJumlah;
                tableSubTotal.innerHTML = convertNumber(tSubTotal);
                tableDiskon.innerHTML = convertNumber(tDiskon);

                fieldTanggalMasuk.value = response.created_at;
                fieldTotal.value = response.total + response.biaya_pengiriman - tDiskon;
                fieldDisplayTotal.value = convertNumber(parseInt(fieldTotal.value));
            }

            function addRow(iter, product) {
                return `<tr>
                            <td>${iter}</td>
                            <td>${product.nama} + warna ${product.pivot.color.name} + ukuran ${product.pivot.size.name}</td>
                            <td class="text-right">${convertNumber(product.harga)}</td>
                            <td class="text-right">x ${product.pivot.jumlah}</td>
                            <td class="text-right">${convertNumber(product.pivot.diskon)}</td>
                            <td class="text-right">${convertNumber(product.pivot.sub_total)}</td>
                        </tr>`;
            }

            function convertNumber(value) {
                if (!value) {
                    return '-';
                }
                return Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(value);
            }

            function convertBerat(value) {
                return Intl.NumberFormat('id-ID', {
                    style: 'unit',
                    unit: value < 1000 ? 'gram' : 'kilogram'
                }).format(value);
            }
        </script>
    @endpush
@endonce
