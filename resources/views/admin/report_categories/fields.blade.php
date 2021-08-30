<!-- Name Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => quired', 'string', 'max:255']]) !!}
</div>