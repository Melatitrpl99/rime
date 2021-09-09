@include('layouts.plugins.select2')

@once
    @push('scripts')
        <script>
            var onUpdate = null;
            var selectedRow = null;
            var rowCount = 0;

            $(document).ready(function (e) {
                table = document.querySelector('#form-body-recursive');
                rowCount = table.children.length;
            });

            function addRow(detail, produk) {
                if (onUpdate) {
                    return `<td class="py-0.5" style="z-index: 3; position: relative;">
                                <input class="form-control" name="row_product" type="checkbox" value="1">
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">
                                    ${detail.nama}
                                </a>
                                <input type="hidden" name="nama[]" value="${detail.nama}">
                                <input type="hidden" name="ket[]" value="${detail.ket}">
                            </td>
                            <td class="text-right">
                                <span>${detail.jumlah} ${detail.unitName}</span>
                                <input type="hidden" name="jumlah_item[]" value="${detail.jumlah}">
                                <input type="hidden" name="spending_unit_id[]" value="${detail.unitId}">
                            </td>
                            <td class="text-right">
                                <span>${convertNumber(detail.subtotal)}</span>
                                <input type="hidden" name="harga_satuan[]" value="${detail.hargaSatuan}">
                                <input type="hidden" name="sub_total[]" value="${detail.subtotal}">
                            </td>
                            <td>
                                <span class="d-block mb-2">${produk.nama}</span>
                                <span class="d-block">warna: ${produk.colorName}</span>
                                <span class="d-block">ukuran: ${produk.sizeName}</span>
                                <input type="hidden" name="product_id[]" value="${produk.id}">
                                <input type="hidden" name="color_id[]" value="${produk.colorId}">
                                <input type="hidden" name="size_id[]" value="${produk.sizeId}">
                            </td>
                            <td>
                                <span class="d-block">${produk.stok}</span>
                                <input type="hidden" name="jumlah_stok[]" value="${produk.stok}">
                            </td>`;
                }
                rowCount++;
                return `<tr id="row-${rowCount}" style="transform: rotate(0)">
                            <td class="py-0.5" style="z-index: 3; position: relative;">
                                <input class="form-control" name="row_product" type="checkbox" value="1">
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">
                                    ${detail.nama}
                                </a>
                                <input type="hidden" name="nama[]" value="${detail.nama}">
                                <input type="hidden" name="ket[]" value="${detail.ket}">
                            </td>
                            <td class="text-right">
                                <span>${detail.jumlah} ${detail.unitName}</span>
                                <input type="hidden" name="jumlah_item[]" value="${detail.jumlah}">
                                <input type="hidden" name="spending_unit_id[]" value="${detail.unitId}">
                            </td>
                            <td class="text-right">
                                <span>${convertNumber(detail.subtotal)}</span>
                                <input type="hidden" name="harga_satuan[]" value="${detail.hargaSatuan}">
                                <input type="hidden" name="sub_total[]" value="${detail.subtotal}">
                            </td>
                            <td>
                                <span class="d-block mb-2">${produk.nama}</span>
                                <span class="d-block">warna: ${produk.colorName}</span>
                                <span class="d-block">ukuran: ${produk.sizeName}</span>
                                <input type="hidden" name="product_id[]" value="${produk.id}">
                                <input type="hidden" name="color_id[]" value="${produk.colorId}">
                                <input type="hidden" name="size_id[]" value="${produk.sizeId}">
                            </td>
                            <td>
                                <span class="d-block">${produk.stok}</span>
                                <input type="hidden" name="jumlah_stok[]" value="${produk.stok}">
                            </td>
                        </tr>`;
            }

            $('#add_row').on('click', function (e) {
                const detail = {
                    nama: $('#names').val(),
                    ket: $('#misc').val(),
                    jumlah: $('#qty_mat').val(),
                    hargaSatuan: $('#price').val(),
                    unitId: $('#unit').find(':selected').val(),
                    unitName: $('#unit').find(':selected').html(),
                    subtotal: $('#subtotal').val()
                };

                const produk = {
                    id: $('#product').find(':selected').val(),
                    nama: $('#product').find(':selected').html(),
                    colorId: $('#color').find(':selected').val(),
                    colorName: $('#color').find(':selected').html(),
                    sizeId: $('#size').find(':selected').val(),
                    sizeName: $('#size').find(':selected').html(),
                    stok: $('#qty_prod').val()
                };

                if (onUpdate) {
                    $('#form-body-recursive tr#' + onUpdate).html(null);
                    $('#form-body-recursive tr#' + onUpdate).html(addRow(detail, produk));
                    onUpdate = null;
                    selectedRow = null;

                    $('#add_row').html('<i class="fas fa-plus mr-sm-1"></i><span class="d-none d-sm-inline">Tambah Data</span>');
                } else {
                    $('#form-body-recursive').append(addRow(detail, produk));
                }

                updateTotal();
            });

            $('#remove_row').on('click', function (e) {
                var checkbox = $('input:checked[name=row_product]');
                var parent = checkbox.parent().parent();
                parent.remove();

                updateTotal();
            });

            function updateDetail(element) {
                let tr = element.parentElement.parentElement;
                let form = tr.parentElement;

                if (selectedRow) {
                    row = form.querySelector('#' + selectedRow);
                    let cols = [].slice.call(row.children, 0);
                    for (let col of cols) {
                        col.children[0].classList.remove('font-weight-bold');
                    }
                }

                onUpdate = tr.id;

                let namaTd = tr.children[1];
                namaTd.children[0].classList.add('font-weight-bold');
                $('#names').val(namaTd.children[1].value.trim());
                $('#misc').val(namaTd.children[2].value.trim());

                let jumlahTd = tr.children[2];
                jumlahTd.children[0].classList.add('font-weight-bold');
                $('#qty_mat').val(jumlahTd.children[1].value);
                $('#unit').val(jumlahTd.children[2].value);

                let subtotalTd = tr.children[3];
                subtotalTd.children[0].classList.add('font-weight-bold');
                $('#price').val(subtotalTd.children[1].value);
                $('#subtotal').val(subtotalTd.children[2].value);

                let productTd = tr.children[4];
                productTd.children[0].classList.add('font-weight-bold');
                $('#product').val(productTd.children[3].value);
                $('#product').trigger('change');
                $('#product').trigger('select2:select');

                $('#color').val(productTd.children[4].value);
                $('#color').trigger('change');
                $('#color').trigger('select2:select');

                $('#size').val(productTd.children[5].value);
                $('#size').trigger('change');
                $('#size').trigger('select2:select');

                let stokTd = tr.children[5];
                stokTd.children[0].classList.add('font-weight-bold');
                $('#qty_prod').val(stokTd.children[1].value);

                selectedRow = tr.id;

                $('#add_row').html('<i class="fas fa-save mr-sm-1"></i><span class="d-none d-sm-inline">Simpan Perubahan</span>');
            }

            function updateJumlah(element) {
                if ($('#price').val()) {
                    $('#subtotal').val(element.value * $('#price').val());
                }
            }

            function updateHarga(element) {
                if ($('#qty_mat').val()) {
                    $('#subtotal').val(element.value * $('#qty_mat').val());
                }
            }

            function updateTotal() {
                let form = document.getElementById('form-body-recursive');
                let trs = form.children;
                let totalHarga = [];

                for (i = 0; i < trs.length; i++) {
                    let subTotal = trs[i].children[2].children[2];
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
@endonce