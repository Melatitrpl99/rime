@push('css')
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
