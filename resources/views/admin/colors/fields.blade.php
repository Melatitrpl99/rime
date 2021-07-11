<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

@push('css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush

<!-- rgba Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rgba_color', 'RGB Color (optional):') !!}
    <div class="input-group rgba-colorpicker">
        {!! Form::text('rgba_color', null, ['class' => 'form-control', 'data-original-title', 'title']) !!}
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-square "></i>
            </span>
        </div>
    </div>
</div>

@push('scripts')
    <!-- bootstrap color picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js" crossorigin="anonymous"></script>
    <script>
        $(".rgba-colorpicker").colorpicker({
            autoInputFallback: false,
            autoHexInputFallback: false,
            format: 'hex'
        });
        $(".rgba-colorpicker").on('colorpickerChange', (event) => {
            $(".rgba-colorpicker .fa-square").css('color', event.color.toString());
        });
    </script>
@endpush

