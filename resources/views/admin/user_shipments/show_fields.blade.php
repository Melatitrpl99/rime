<!-- Alamat Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Alamat</div>
    <div class="col-12 col-md-9">{{ $userShipment->alamat }}</div>
</div>

<!-- Village Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Daerah</div>
    <div class="col-12 col-md-9">{{ $userShipment->village->name }}</div>
</div>

<!-- Kode Pos Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kode Pos</div>
    <div class="col-12 col-md-9">{{ $userShipment->kode_pos }}</div>
</div>

<!-- Catatan Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Catatan</div>
    <div class="col-12 col-md-9">{{ $userShipment->catatan }}</div>
</div>

<!-- User Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User Id</div>
    <div class="col-12 col-md-9">{{ $userShipment->user->nama_lengkap }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created At</div>
    <div class="col-12 col-md-9">{{ $userShipment->created_at->addHour(8) }}</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated At</div>
    <div class="col-12 col-md-9">{{ $userShipment->updated_at->addHour(8) }}</div>
</div>
