@include('layouts.plugins.datetimepicker')

@include('layouts.plugins.select2')

@include('layouts.plugins.ckeditor5')

@once
    @push('scripts')
        <script>
            var rowCount = 0;
            var onUpdate = null;
            var selectedRow = null;

            function addRow(product, min, max, discount) {
                if (onUpdate) {
                    return `<td class="py-0.5" style="z-index: 3; position: relative;">
                                <input class="form-control" name="row_product" type="checkbox" value="1">
                            </td>
                            <td>
                                <input name="product_id[]" type="hidden" value="${product.id}">
                                <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">${product.name}</a>
                                <i class="fas fa-pencil-alt fa-xs ml-1 text-info"></i>
                            </td>
                            <td class="text-right">
                                <input name="minimal_produk[]" type="hidden" value="${min}">
                                <span>${min}</span>
                            </td>
                            <td class="text-right">
                                <input name="maksimal_produk[]" type="hidden" value="${max}">
                                <span>${max}</span>
                            </td>
                            <td class="text-right">
                                <input name="diskon_harga[]" type="hidden" value="${discount}">
                                <span>${convertNumber(discount)}</span>
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
                            <td class="text-right">
                                <input name="minimal_produk[]" type="hidden" value="${min}">
                                <span>${min}</span>
                            </td>
                            <td class="text-right">
                                <input name="maksimal_produk[]" type="hidden" value="${max}">
                                <span>${max}</span>
                            </td>
                            <td class="text-right">
                                <input name="diskon_harga[]" type="hidden" value="${discount}">
                                <span>${convertNumber(discount)}</span>
                            </td>
                        </tr>`;
            }

            $('#add_row').on('click', function() {
                const product = {
                    id: $('#products').find(':selected').val(),
                    name: $('#products').find(':selected').html()
                };

                const min = $('#discount_min').val();
                const max = $('#discount_max').val();
                const discount = $('#discount_price').val();

                if (onUpdate) {
                    $('#form-body-recursive tr#' + onUpdate).html(null);
                    $('#form-body-recursive tr#' + onUpdate).html(addRow(product, min, max, discount));
                    onUpdate = null;

                    $('#add_row').html('<i class="fas fa-plus mr-sm-1"></i><span class="d-none d-sm-inline">Tambah Data</span>');
                } else {
                    $('#form-body-recursive').append(addRow(product, min, max, discount));
                }
            });

            $('#remove_row').on('click', function(e) {
                var checkbox = $('input:checked[name=row_product]');
                var parent = checkbox.parent().parent();
                parent.remove();
            });

            $('#random_discount_code').on('click', function() {
                value = generateRandomString();
                $('#kode').val(value);
            });

            $('#waktu_mulai').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                sideBySide: false
            });

            $('#waktu_berakhir').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                sideBySide: false
            });

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

                element.classList.add('font-weight-bold');
                $('#products').val(element.previousElementSibling.value);
                $('#products').trigger('change');
                $('#products').trigger('select2:select');

                let minBeliTd = productTd.nextElementSibling;
                minBeliTd.children[1].classList.add('font-weight-bold');
                $('#discount_min').val(minBeliTd.children[0].value);

                let maxBeliTd = minBeliTd.nextElementSibling;
                maxBeliTd.children[1].classList.add('font-weight-bold');
                $('#discount_max').val(maxBeliTd.children[0].value);

                let diskonHargaTd = maxBeliTd.nextElementSibling;
                diskonHargaTd.children[1].classList.add('font-weight-bold');
                $('#discount_price').val(diskonHargaTd.children[0].value);

                selectedRow = tr.id;

                $('#add_row').html('<i class="fas fa-save mr-sm-1"></i><span class="d-none d-sm-inline">Simpan Perubahan</span>');
            }

            function generateRandomString(length = 8) {
                const upper = [..."ABCDEFGHIJKLMNOPQRSTUVWXYZ"];
                const lower = [..."abcdefghijklmnopqrstuvwxyz"];
                const unique = [..."+="];
                const nums = [..."0123456789"];

                const base = [...upper, ...lower, ...nums, ...unique];

                const generator = (base, len) => {
                    return [...Array(len)]
                        .map(i => base[Math.random() * base.length | 0])
                        .join('');
                };

                return generator(base, length);
            }
        </script>
    @endpush
@endonce
