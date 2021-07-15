<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Product</div>
    <div class="col-12 col-md-9">{{ $productStock->product->nama }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Color</div>
    <div class="col-12 col-md-9">{{ $productStock->color->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Size</div>
    <div class="col-12 col-md-9">{{ $productStock->size->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Dimension</div>
    <div class="col-12 col-md-9">{{ $productStock->dimension->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Stok Ready</div>
    <div class="col-12 col-md-9">{{ $productStock->stok_ready }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $productStock->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $productStock->updated_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="row">
    <a class="btn btn-default" href="{{ route('admin.product_stocks.index') }}">Back</a>
</div>
