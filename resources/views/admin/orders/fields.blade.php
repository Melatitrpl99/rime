<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Shipment Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('shipment_id', 'Alamat pengiriman') !!}
    {!! Form::select('shipment_id', array(), null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Pesan Field -->
<div class="form-group col-12">
    {!! Form::label('pesan', 'Pesan') !!}
    {!! Form::textarea('pesan', null, ['class' => 'form-control']) !!}
</div>

<!-- Diskon Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode_diskon', 'Diskon') !!}
    <div class="input-group">
        {!! Form::text('kode_diskon', null, ['class' => 'form-control']) !!}
        <div class="input-group-append">
            <button class="btn btn-info" type="button" id="cek_diskon">Cek diskon</button>
        </div>
    </div>
</div>

<!-- Biaya Pengiriman Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('biaya_pengiriman', 'Biaya Pengiriman') !!}
    {!! Form::number('biaya_pengiriman', null, ['class' => 'form-control']) !!}
</div>

<!-- Berat Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('berat', 'Berat') !!}
    {!! Form::number('berat', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Resi Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode_resi', 'Kode Resi') !!}
    {!! Form::text('kode_Resi', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('status_id', 'Status') !!}
    {!! Form::select('status_id', $statusItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Cart Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('cart_id', 'Keranjang') !!}
    <div class="input-group">
        {!! Form::select('cart_id', array(), null, ['class' => 'form-control select2-dropdown', 'placeholder' => 'Pilih keranjang...']) !!}
        <div class="input-group-append">
            <button class="btn btn-outline-info" type="button" id="import_from_cart">
                <i class="fas fa-cart-arrow-down mr-1"></i> Impor
            </button>
        </div>
    </div>
</div>

@include('admin.orders.table_fields')

@include('layouts.plugins.select2')

@push('scripts')
    <script>
        $('button#cek_diskon').on('click', function () {
            // $(this).attr('class', 'btn btn-info overlay dark')
            // $(this).prepend(`<i class="fas fa-spinner fa-spin mr-1"></i>`);
            if ($('#kode_diskon').val().length != 0) {
                showLoading($(this));
                $.ajax({
                    url: "{{ route('cek_diskon') }}",
                    type: 'get',
                    data: {
                        diskon: $('#kode_diskon').val()
                    },
                    success: function (response) {
                        if (response.exists) {
                            $('button#cek_diskon').attr('class', 'btn btn-success');
                            $('button#cek_diskon').html('<i class="fas fa-check mr-1"></i> Diskon ditemukan');
                        } else {
                            $('button#cek_diskon').attr('class', 'btn btn-danger');
                            $('button#cek_diskon').html('<i class="fas fa-times mr-1"></i> Diskon tidak ditemukan');
                        }
                    },
                    error: function (xhr) {
                    }
                });
            }
        });

        function showLoading() {
            $('button#cek_diskon').attr('class', 'btn btn-secondary');
            $('button#cek_diskon').html('<i class="fas fa-spinner fa-spin mr-1"></i> Tunggu sebentar...');
        }
    </script>
@endpush