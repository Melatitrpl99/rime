<!-- Loggable Field -->
<div class="col-sm-12">
    {!! Form::label('loggable', 'Loggable:') !!}
    <p>{{ $activity->loggable }}</p>
</div>

<!-- User Agent Field -->
<div class="col-sm-12">
    {!! Form::label('user_agent', 'User Agent:') !!}
    <p>{{ $activity->user_agent }}</p>
</div>

<!-- Ip Address Field -->
<div class="col-sm-12">
    {!! Form::label('ip_address', 'Ip Address:') !!}
    <p>{{ $activity->ip_address }}</p>
</div>

<!-- Log Field -->
<div class="col-sm-12">
    {!! Form::label('log', 'Log:') !!}
    <p>{{ $activity->log }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $activity->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $activity->updated_at }}</p>
</div>

