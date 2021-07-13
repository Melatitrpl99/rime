@push('css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush

@push('scripts')
    <!-- bootstrap color picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js" crossorigin="anonymous"></script>
    <script>
        $("#bootstrap-colorpicker").colorpicker({
            autoInputFallback: false,
            autoHexInputFallback: false,
            format: 'hex'
        });
        $("#bootstrap-colorpicker").on('colorpickerChange', (event) => {
            $("#bootstrap-colorpicker .fa-square").css('color', event.color.toString());
        });
    </script>
@endpush
