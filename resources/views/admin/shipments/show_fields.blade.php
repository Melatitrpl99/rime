<!-- Alamat Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Alamat:</div>
    <div class="col-12 col-md-9">{{ $shipment->alamat }}</div>
</div>

<!-- No Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">No:</div>
    <div class="col-12 col-md-9">{{ $shipment->no }}</div>
</div>

<!-- Rt Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Rt:</div>
    <div class="col-12 col-md-9">{{ $shipment->rt }}</div>
</div>

<!-- Rw Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Rw:</div>
    <div class="col-12 col-md-9">{{ $shipment->rw }}</div>
</div>

<!-- Village Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Village Id:</div>
    <div class="col-12 col-md-9">{{ $shipment->village_id }}</div>
</div>

<!-- Kode Pos Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kode Pos:</div>
    <div class="col-12 col-md-9">{{ $shipment->kode_pos }}</div>
</div>

<!-- Catatan Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Catatan:</div>
    <div class="col-12 col-md-9">{{ $shipment->catatan }}</div>
</div>

<!-- User Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User Id:</div>
    <div class="col-12 col-md-9">{{ $shipment->user_id }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created At:</div>
    <div class="col-12 col-md-9">{{ $shipment->created_at->addHour(8) }}</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated At:</div>
    <div class="col-12 col-md-9">{{ $shipment->updated_at->addHour(8) }}</div>
</div>
