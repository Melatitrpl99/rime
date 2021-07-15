<!-- Name Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- rgba Color Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('rgba_color', 'Hex RGB Color (optional):') !!}
    <div class="input-group " id="bootstrap-colorpicker">
        {!! Form::text('rgba_color', null, ['class' => 'form-control', 'data-original-title', 'title']) !!}
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-square"></i>
            </span>
        </div>
    </div>
</div>

@include('layouts.plugins.bootstrap-colorpicker')

