<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Discount</div>
    <div class="col-12 col-md-9">{{ $discountDetail->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Product</div>
    <div class="col-12 col-md-9">{{ $discountDetail->product->nama }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Diskon Harga</div>
    <div class="col-12 col-md-9">Rp. {{ number_format($discountDetail->diskon_harga, 2, ',', '.') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Minimal Produk</div>
    <div class="col-12 col-md-9">{{ $discountDetail->minimal_produk }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Maksimal Produk</div>
    <div class="col-12 col-md-9">{{ $discountDetail->maksimal_produk }}</div>
</div>

<div class="row">
    <a class="btn btn-default" href="{{ route('admin.discount_details.index') }}">Back</a>
</div>
