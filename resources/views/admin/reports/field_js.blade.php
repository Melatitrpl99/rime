@include('admin._layouts.plugins.ckeditor5')

@include('admin._layouts.plugins.filepond', ['multiple' => true])

@include('admin._layouts.plugins.datetimepicker')

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
