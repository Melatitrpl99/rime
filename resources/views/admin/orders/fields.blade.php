<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor', 'Nomor Order:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control','maxlength' => 16]) !!}
</div>

<!-- Pesan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pesan', 'Pesan:') !!}
    {!! Form::textarea('pesan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_diskon', 'Kode Diskon:') !!}
    {!! Form::text('kode_diskon', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', $statusItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<div class="form-group col-12">
    <hr class="mb-3">
    <h4 class="text-bold text-primary">Produk yang dibeli</h4>
</div>

<div class="col-12" id="add_products">
    <div class="row">
        <div class="form-group col-md-12 col-lg-6">
            {!! Form::select('product_id[]', $productItems, null, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih produk...']) !!}
        </div>
        <div class="col col-md-12 col-lg-3">
            {!! Form::text('harga[]', null, ['class' => 'form-control', 'readonly']) !!}
        </div>
        <div class="form-group col-md-12 col-lg-2">
            {!! Form::number('jumlah[]', null, ['class' => 'form-control', 'placeholder' => 'Jumlah']) !!}
        </div>
        <div class="form-group col-md-12 col-lg-1">
            {!! Form::button('+', ['class' => 'btn btn-info']) !!}
        </div>
    </div>
</div>

<div class="col-12 table-responsive" id="product_list">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Warna</th>
                <th>Size</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Khimar Kayla</td>
                <td>Putih</td>
                <td>XL</td>
                <td>Rp. 15.000</td>
                <td>x3</td>
                <td>Rp. 45.000</td>
                <td width="10px">
                    <div class="btn-group">
                        <a href="#" class="btn btn-default btn-xs px-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-default btn-xs px-2">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5"></th>
                <th>Subtotal</th>
                <th colspan="2">Rp. 45.000</th>
            </tr>
        </tfoot>
    </table>
</div>
