<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $activity->name }}</p>
</div>

<!-- Desc Field -->
<div class="col-sm-12">
    {!! Form::label('desc', 'Desc:') !!}
    <p>{{ $activity->desc }}</p>
</div>

<!-- Loggable Field -->
<div class="col-sm-12">
    {!! Form::label('loggable', 'Loggable:') !!}
    <p>{{ $activity->loggable }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $activity->user_id }}</p>
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

