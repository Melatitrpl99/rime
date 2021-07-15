<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nama Lengkap</div>
    <div class="col-12 col-md-9">{{ $shipment->nama_lengkap }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Alamat Lengkap</div>
    <div class="col-12 col-md-9">{{ $shipment->alamat . ' No. ' .$shipment->no . ' RT ' . $shipment->rt . ' RW ' . $shipment->rw . ', ' . ucwords(strtolower($shipment->village->name)) . ', ' . ucwords(strtolower($shipment->village->district->name)) . ', ' . ucwords(strtolower($shipment->village->district->regency->name)) . ', ' . ucwords(strtolower($shipment->village->district->regency->province->name)) }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Kode Pos</div>
    <div class="col-12 col-md-9">{{ $shipment->kode_pos }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Catatan</div>
    <div class="col-12 col-md-9">{{ $shipment->catatan }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Order</div>
    <div class="col-12 col-md-9">{{ $shipment->order->nomor }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $shipment->created_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $shipment->updated_at->format('d F Y - H:m:s') }}</div>
</div>

<div class="row">
    <a class="btn btn-default" href="{{ route('admin.shipments.index') }}">Back</a>
</div>
