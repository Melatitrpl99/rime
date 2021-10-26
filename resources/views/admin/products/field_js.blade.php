@include('admin._layouts.plugins.filepond', ['multiple' => true])

@include('admin._layouts.plugins.select2')

@include('admin._layouts.plugins.ckeditor5')

@push('scripts')
    <script>
        var onUpdate = null;
        var selectedRow = null;
        var rowCount = 0;

        $(document).ready(function (e) {
            table = document.querySelector('#form-body-recursive');
            rowCount = table.children.length;
        });

        function addRow(color, size, stokReady) {
            if (onUpdate) {
                return `<td class="py-0.5" style="z-index: 3; position: relative;">
                            <input class="form-control" name="row_product" type="checkbox" value="1">
                        </td>
                        <td>
                            <input name="color_id[]" type="hidden" value="${color.id}">
                            <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">${color.name}</a>
                            <i class="fas fa-pencil-alt fa-xs ml-1 text-info"></i>
                        </td>
                        <td>
                            <input name="size_id[]" type="hidden" value="${size.id}">
                            <span>${size.name}</span>
                        </td>
                        <td class="text-right">
                            <input name="stok_ready[]" type="hidden" value="${stokReady}">
                            <span>${stokReady}</span>
                        </td>`;
            }
            rowCount++;
            return `<tr style="transform: rotate(0)" id="row-${rowCount}">
                        <td class="py-0.5" style="z-index: 3; position: relative;">
                            <input class="form-control" name="row_product" type="checkbox" value="1">
                        </td>
                        <td>
                            <input name="color_id[]" type="hidden" value="${color.id}">
                            <a href="javascript:void(0)" class="stretched-link text-decoration-none text-reset" onclick="updateDetail(this)">${color.name}</a>
                            <i class="fas fa-pencil-alt fa-xs ml-1 text-info"></i>
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

            if (onUpdate) {
                $('#form-body-recursive tr#' + onUpdate).html(null);
                $('#form-body-recursive tr#' + onUpdate).html(addRow(color, size, jumlah));
                onUpdate = null;

                $('#add_row').html('<i class="fas fa-plus mr-sm-1"></i><span class="d-none d-sm-inline">Tambah Data</span>');
            } else {
                $('#form-body-recursive').append(addRow(color, size, jumlah));
            }

            updateTotal();
        });

        $('#remove_row').on('click', function(e) {
            var checkbox = $('input:checked[name=row_product]');
            var parent = checkbox.parent().parent();
            parent.remove();

            updateTotal();
        });

        function updateDetail(element) {
            let colorTd = element.parentElement;
            let tr = colorTd.parentElement;
            let form = tr.parentElement;

            if (selectedRow) {
                row = form.querySelector('#' + selectedRow);
                let cols = [].slice.call(row.children, 1);
                for (let col of cols) {
                    col.children[1].classList.remove('font-weight-bold');
                }
            }

            onUpdate = tr.id;

            colorTd.children[1].classList.add('font-weight-bold');
            $('#colors').val(colorTd.children[0].value);
            $('#colors').trigger('change');
            $('#colors').trigger('select2:select');

            let sizeTd = colorTd.nextElementSibling;
            sizeTd.children[1].classList.add('font-weight-bold');
            $('#sizes').val(sizeTd.children[0].value);
            $('#sizes').trigger('change');
            $('#sizes').trigger('select2:select');

            let stokReadyTd = sizeTd.nextElementSibling;
            stokReadyTd.children[1].classList.add('font-weight-bold');
            $('#jmlh').val(stokReadyTd.children[0].value);

            selectedRow = tr.id;

            $('#add_row').html('<i class="fas fa-save mr-sm-1"></i><span class="d-none d-sm-inline">Simpan Perubahan</span>');
        }

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
