
@push('scripts')
    <script>
        function addRow(color, size, stokReady) {
            return `<tr>
                        <td class="py-0.5">
                            <input class="form-control" name="row_product" type="checkbox" value="1">
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
                            <input name="stok_ready[]" type="hidden" value="${stokReady}">
                            <span>${stokReady}</span>
                        </td>
                    </tr>`;
        }

        $('#add_row').on('click', function() {
            const color = {
                id: $('#colors').find(':selected').val(),
                name: $('#colors').find(':selected').html()
            };

            const size = {
                id: $('#sizes').find(':selected').val(),
                name: $('#sizes').find(':selected').html()
            };

            const jumlah = document.querySelector('#jmlh').value;

            $('#form-body-recursive').append(addRow(color, size, jumlah));

            updateTotal();
        });

        $('#remove_row').on('click', function(e) {
            var checkbox = $('input:checked[name=row_product]');
            var parent = checkbox.parent().parent();
            parent.remove();

            updateTotal();
        });

        function updateStokProduk(el) {
            if (el.value < 1) {
                el.value = 1;
            }

            updateTotal();
        }

        function updateTotal() {
            let form = document.getElementById('form-body-recursive');
            let trs = form.children;
            let totalStok = [];

            for (i = 0; i < trs.length; i++) {
                let stokReady = trs[i].lastElementChild.children[0];
                totalStok[i] = parseInt(stokReady.value);
            }

            let total = document.getElementById('total');
            total.value = totalStok.reduce((a, b) => {
                return a + b;
            }, 0);

            let calc = document.getElementById('calc');
            calc.innerHTML = total.value;
        }
    </script>
@endpush

@include('layouts.plugins.filepond')

@include('layouts.plugins.select2')

@include('layouts.plugins.ckeditor5')
