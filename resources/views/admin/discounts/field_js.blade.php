@include('layouts.plugins.datetimepicker')

@include('layouts.plugins.select2')

@include('layouts.plugins.ckeditor5')

@once
    @push('scripts')
        <script>
            function addRow(product, min, max, discount) {
                return `<tr>
                            <td class="py-0.5"><input class="form-control" name="row_product" type="checkbox" value="1"></td>
                            <td>
                                <input name="product_id[]" type="hidden" value="${product.id}">
                                <span>${product.name}</span>
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

                $('#form-body-recursive').append(addRow(product, min, max, discount));
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

            function convertNumber(value) {
                return Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(value);
            }
        </script>
    @endpush
@endonce
