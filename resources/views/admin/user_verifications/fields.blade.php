<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Result Token Field -->
<div class="form-group col-12">
    {!! Form::label('result_token', 'Result Token:') !!}
    {!! Form::textarea('result_token', null, ['class' => 'form-control']) !!}
</div>