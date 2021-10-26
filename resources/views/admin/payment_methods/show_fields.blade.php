<!-- Name Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Nama</div>
    <div class="col-12 col-md-9">{{ $paymentMethod->name }}</div>
</div>

<!-- Deskripsi Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Keterangan</div>
    <div class="col-12 col-md-9">{!! $paymentMethod->ket !!}</div>
</div>