<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Batas Pemakaian Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('batas_pemakaian', 'Batas Pemakaian:') !!}
    {!! Form::number('batas_pemakaian', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Mulai Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    {!! Form::text('waktu_mulai', null, ['class' => 'form-control datetimepicker-input', 'id' => 'waktu_mulai', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_mulai']) !!}
</div>

<!-- Waktu Berakhir Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    {!! Form::text('waktu_berakhir', null, ['class' => 'form-control datetimepicker-input', 'id' => 'waktu_berakhir', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_berakhir']) !!}
</div>

<div class="col-md-12">
    <div class="d-flex justify-content-between align-items center">
        <h4>Detail Discounts</h4>
        <div class="d-flex justify-content right align-items-center">
            <button type="button" id="add_row" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
            <button type="button" id="remove_row" class="btn btn-danger ml-2"><i class="fas fa-minus"></i> Hapus Data</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <tr class="border-bottom">
                <th>#</th>
                <th>Produk</th>
                <th>diskon_harga</th>
                <th>minimal_produk</th>
                <th>maksimal_produk</th>
            </tr>
        </thead>
        <tbody id="form-body-recursive">
            @if (Route::currentRouteName() == 'admin.discounts.edit')
                @foreach ($discount->products as $product)
                    <tr>
                        <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>{!! Form::select('product_id[]', $productItems, $product->id, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)']) !!}</td>
                        <td>{!! Form::number('diskon_harga[]', $product->pivot->diskon_harga, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::number('minimal_produk[]', $product->pivot->minimal_produk, ['class' => 'form-control']) !!}</td>
                        <td>{!! Form::number('maksimal_produk[]', $product->pivot->maksimal_produk, ['class' => 'form-control']) !!}</td>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="border-top">
                <th colspan="5"></th>
                <th>Total</th>
                <th>
                    {!! Form::hidden('total', null, ['id' => 'total']) !!}
                    {!! Form::text('calc', Route::currentRouteName() == 'admin.discount.edit' ? 'Rp '.number_format($discount->total, '2', ',', '.') : '', ['class' => 'form-control-plaintext', 'readonly' => true, 'id' => 'calc']) !!}
                </th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
<script>
    var data = 0;

    function addRow() {
        return `<tr>
                    <td>{!! Form::checkbox('row_product', '1', null, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::select('product_id[]', $productItems, null , ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)']) !!}</td>
                    <td>{!! Form::number('diskon_harga[]', null, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::number('minimal_produk[]', null, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::number('maksimal_produk[]', null, ['class' => 'form-control']) !!}</td>
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

@include('layouts.plugins.datetimepicker')

@once
    @push('scripts')
    <script>
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
    </script>
    @endpush
@endonce
