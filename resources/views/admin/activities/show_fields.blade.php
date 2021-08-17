<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Loggable Type</div>
    <div class="col-12 col-md-9">{{ $activity->loggable_type }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Loggable id</div>
    <div class="col-12 col-md-9">{{ $activity->loggable_id }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User agent</div>
    <div class="col-12 col-md-9">{{ $activity->user_agent }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">IP Address</div>
    <div class="col-12 col-md-9">{{ $activity->ip_address }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Log message</div>
    <div class="col-12 col-md-9">{{ $activity->log }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created at</div>
    <div class="col-12 col-md-9">{{ $activity->created_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>

<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated at</div>
    <div class="col-12 col-md-9">{{ $activity->updated_at->addHour(8)->format('d F Y - H:m:s') }}</div>
</div>
