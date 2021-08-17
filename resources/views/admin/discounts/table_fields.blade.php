<div class="col-12">
    <div class="d-flex justify-content-between align-items center">
        <h4>Detail diskon</h4>
        <div class="d-flex justify-content right align-items-center">
            <button type="button" id="add_row" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
            <button type="button" id="remove_row" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i> Hapus Data</button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <tr class="border-bottom">
                <th width="40">#</th>
                <th>Produk</th>
                <th width="100">Min</th>
                <th width="100">Max</th>
                <th width="150">Diskon harga</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.discounts.edit')
                @foreach ($discount->products as $product)
                    <tr>
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::select('product_id[]', $productItems, $product->id, ['class' => 'form-control custom-select']) !!}</td>
                        <td>{!! Form::number('minimal_produk[]', $product->pivot->minimal_produk, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::number('maksimal_produk[]', $product->pivot->maksimal_produk, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::number('diskon_harga[]', $product->pivot->diskon_harga, ['class' => 'form-control']) !!}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    var data = 0;

    function addRow() {
        return `<tr>
                    <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::select('product_id[]', $productItems, null , ['class' => 'form-control custom-select']) !!}</td>
                    <td>{!! Form::number('minimal_produk[]', null, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::number('maksimal_produk[]', null, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::number('diskon_harga[]', null, ['class' => 'form-control']) !!}</td>
                </tr>`;
    }

    $('#add_row').on('click', function () {
        $('#form-body-recursive').append(addRow());
    });

    $('#remove_row').on('click', function (e) {
        var checkbox = $('input:checked[name=row_product]');
        var parent = checkbox.parent().parent();
        parent.remove();
    });

    function convertNumber(value) {
        return Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(value);
    }
</script>
@endpush