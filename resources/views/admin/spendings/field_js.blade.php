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
                                <input type="hidden" name="nama[]" value="${detail.nama}">
                                <input type="hidden" name="ket[]" value="${detail.ket}">
                                <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">
                                    ${detail.nama}
                                </a>
                            </td>
                            <td class="text-right">
                                <input type="hidden" name="jumlah[]" value="${detail.jumlah}">
                                <input type="hidden" name="spending_unit_id[]" value="${detail.unitId}">
                                <span>${detail.jumlah} ${detail.unit}</span>
                            </td>
                            <td class="text-right">
                                <input type="hidden" name="harga_satuan[]" value="${detail.hargaSatuan}">
                                <span>${convertNumber(detail.hargaSatuan)}</span>
                            </td>
                            <td>
                                <input type="hidden" name="product_id[]" value="${produk.id}">
                                <input type="hidden" name="color_id[]" value="${produk.colorId}">
                                <input type="hidden" name="size_id[]" value="${produk.sizeId}">
                                <span class="d-block mb-2">${produk.nama}</span>
                                <span class="d-block">${produk.colorName}</span>
                                <span class="d-block">${produk.sizeName}</span>
                            </td>
                            <td>
                                <input type="hidden" name="jumlah_stok[]" value="${produk.stok}">
                                <span class="d-block">${produk.stok}</span>
                            </td>`;
                }
                rowCount++;
                return `<tr id="row-${rowCount}" style="transform: rotate(0)">
                            <td class="py-0.5" style="z-index: 3; position: relative;">
                                <input class="form-control" name="row_product" type="checkbox" value="1">
                            </td>
                            <td>
                                <input type="hidden" name="nama[]" value="${detail.nama}">
                                <input type="hidden" name="ket[]" value="${detail.ket}">
                                <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">
                                    ${detail.nama}
                                </a>
                            </td>
                            <td class="text-right">
                                <input type="hidden" name="jumlah[]" value="${detail.jumlah}">
                                <input type="hidden" name="spending_unit_id[]" value="${detail.unitId}">
                                <span>${detail.jumlah} ${detail.unitName}</span>
                            </td>
                            <td class="text-right">
                                <input type="hidden" name="harga_satuan[]" value="${detail.hargaSatuan}">
                                <span>${convertNumber(detail.subTotal)}</span>
                            </td>
                            <td>
                                <input type="hidden" name="product_id[]" value="${produk.id}">
                                <input type="hidden" name="color_id[]" value="${produk.colorId}">
                                <input type="hidden" name="size_id[]" value="${produk.sizeId}">
                                <span class="d-block mb-2">${produk.nama}</span>
                                <span class="d-block">${produk.colorName}</span>
                                <span class="d-block">${produk.sizeName}</span>
                            </td>
                            <td>
                                <input type="hidden" name="jumlah_stok[]" value="${produk.stok}">
                                <span class="d-block">${produk.stok}</span>
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
                    sizeName: $('#size').find(':selected').val(),
                    stok: $('#qty_prod').val()
                };

                if (onUpdate) {
                    $('#form-body-recursive tr#' + onUpdate).html(null);
                    $('#form-body-recursive tr#' + onUpdate).html(addRow(detail, produk));
                } else {
                    $('#form-body-recursive').append(addRow(detail, produk));
                }
            });

            $('#remove_row').on('click', function (e) {
                var checkbox = $('input:checked[name=row_product]');
                var parent = checkbox.parent().parent();
                parent.remove();
            });

            function updateDetail(element) {

                let tr = element.parentElement.parentElement;
                let form = tr.parentElement;

                if (selectedRow) {
                    row = form.querySelector('#' + selectedRow);
                    let cols = [].slice.call(row.children, 0);
                    for (let col of cols) {
                        col.children[1].classList.remove('font-weight-bold');
                    }
                }

                onUpdate = tr.id;
                
                selectedRow = tr.id;
            }

        </script>
    @endpush
@endonce