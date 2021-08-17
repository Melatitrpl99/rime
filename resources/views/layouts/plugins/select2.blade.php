@once
    @push('css')
        <!-- select2 -->
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @endpush
    @push('scripts')
        <!-- select2 -->
        <script src="{{ asset('adminlte/plugins/select2/js/select2.min.js') }}"></script>
        <script>
            $(document).ready(() => {
                $('.select2-dropdown').select2({
                    theme: 'bootstrap4'
                });
            });
        </script>
    @endpush
@endonce
