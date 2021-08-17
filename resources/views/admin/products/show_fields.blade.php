<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nama</div>
    <div class="col-12 col-md-9">{{ $product->nama }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Deskripsi</div>
    <div class="col-12 col-md-9">{{ $product->deskripsi }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Harga Customer</div>
    <div class="col-12 col-md-9">{{ rp($product->harga_customer) }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Harga Reseller</div>
    <div class="col-12 col-md-9">{{ rp($product->harga_reseller) }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Reseller Minimum</div>
    <div class="col-12 col-md-9">{{ $product->reseller_minimum }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kategori</div>
    <div class="col-12 col-md-9">{{ $product->productCategory->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $product->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $product->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>