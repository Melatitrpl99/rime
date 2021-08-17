<!-- Product Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Product Id:</div>
    <div class="col-12 col-md-9">{{ $testimony->product_id }}</div>
</div>

<!-- Judul Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Judul:</div>
    <div class="col-12 col-md-9">{{ $testimony->judul }}</div>
</div>

<!-- Isi Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Isi:</div>
    <div class="col-12 col-md-9">{{ $testimony->isi }}</div>
</div>

<!-- Review Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Review:</div>
    <div class="col-12 col-md-9">{{ $testimony->review }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created At:</div>
    <div class="col-12 col-md-9">{{ $testimony->created_at->addHour(8) }}</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated At:</div>
    <div class="col-12 col-md-9">{{ $testimony->updated_at->addHour(8) }}</div>
</div>
