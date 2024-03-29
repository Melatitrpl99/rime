<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Name</div>
    <div class="col-12 col-md-9">{{ $color->name }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Hex RGB Value</div>
    <div class="col-12 col-md-9">{{ $color->rgba_color }} <i class="fas fa-square ml-1" style="color: {{ $color->rgba_color }}"></i></div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $color->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $color->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>