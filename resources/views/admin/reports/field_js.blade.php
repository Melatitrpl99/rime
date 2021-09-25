@include('layouts.plugins.ckeditor5')

@include('layouts.plugins.filepond', ['multiple' => true])

@include('layouts.plugins.datetimepicker')

@once
    @push('scripts')
        <script>
            $('#laporan_mulai').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: false
            });

            $('#laporan_selesai').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: false
            });
        </script>
    @endpush
@endonce
