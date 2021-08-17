<div class="col-12 mt-4 mb-2">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Stok produk</h4>
        <div class="ml-auto d-flex justify-content-end align-items-center">
            <button type="button" id="add_row" class="btn btn-primary ml-2"><i class="fas fa-plus mr-sm-1"></i>
                <span class="d-none d-sm-inline">Tambah Data</span>
            </button>
            <button type="button" id="remove_row" class="btn btn-danger ml-2"><i class="fas fa-trash-alt mr-sm-1"></i>
                <span class="d-none d-sm-inline">Hapus Data</span>
            </button>
        </div>
    </div>
</div>

<div class="col-12 table-responsive">
    <table class="table table-borderless" style="min-width: 1024px">
        <thead>
            <tr class="border-bottom">
                <th width="40">#</th>
                <th>Warna</th>
                <th>Size</th>
                <th width="150">Stok ready</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.products.edit')
                @foreach ($product->productStocks as $productStock)
                    <tr>
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::select('color_id[]', $colorItems, $productStock->color_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih warna...']) !!}</td>
                        <td>{!! Form::select('size_id[]', $sizeItems, $productStock->size_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih ukuran...']) !!}</td>
                        <td>{!! Form::number('stok_ready[]', $productStock->stok_ready, ['class' => 'form-control', 'onchange' => 'updateStokProduk(this)']) !!}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="border-top">
                <th colspan="2"></th>
                <th class="text-right">Total</th>
                <th class="text-right">
                    {!! Form::text('total', Route::currentRouteName() == 'admin.products.edit' ? $product->productStocks->sum('stok_ready') : '', ['class' => 'form-control-plaintext m-0 p-0 border-0', 'readonly' => true, 'id' => 'total']) !!}
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
    <script>
        function addRow() {
            return `<tr>
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::select('color_id[]', $colorItems, null, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih warna...']) !!}</td>
                        <td>{!! Form::select('size_id[]', $sizeItems, null, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih ukuran...']) !!}</td>
                        <td>{!! Form::number('stok_ready[]', null, ['class' => 'form-control', 'onchange' => 'updateStokProduk(this)']) !!}</td>
                    </tr>`;
        }

        $('#add_row').on('click', function() {
            $('#form-body-recursive').append(addRow());
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
        }
    </script>
@endpush