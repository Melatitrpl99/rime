<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Cart</div>
    <div class="col-12 col-md-9">{{ $orderDetail->cart->judul }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Product</div>
    <div class="col-12 col-md-9">{{ $orderDetail->product->nama }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Color</div>
    <div class="col-12 col-md-9">{{ $orderDetail->color->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Size</div>
    <div class="col-12 col-md-9">{{ $orderDetail->size->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Dimension</div>
    <div class="col-12 col-md-9">{{ $orderDetail->dimension->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Jumlah</div>
    <div class="col-12 col-md-9">{{ $orderDetail->jumlah }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Sub Total</div>
    <div class="col-12 col-md-9">Rp. {{ number_format($orderDetail->sub_total, 2, ',', '.') }}</div>
</div>

<div class="row">
    <a href="{{ route('admin.order_details.index') }}" class="btn btn-default">Back</a>
</div>
