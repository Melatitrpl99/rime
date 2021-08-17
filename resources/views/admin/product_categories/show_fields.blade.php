<!-- Name Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Name:</div>
    <div class="col-12 col-md-9">{{ $productCategory->name }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created At:</div>
    <div class="col-12 col-md-9">{{ $productCategory->created_at->addHour(8) }}</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated At:</div>
    <div class="col-12 col-md-9">{{ $productCategory->updated_at->addHour(8) }}</div>
</div>