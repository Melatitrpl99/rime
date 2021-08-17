@once
    @push('css')
        <!-- Filepond -->
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

        <!-- Filepond Image Preview -->
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

        <style>
            .filepond--item {
                width: calc(25% - 0.5em);
            }

        </style>
    @endpush

    @push('scripts')
        <!-- Filepond -->
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

        <!-- Filepond Image EXIF Orientation -->
        <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>

        <!-- Filepond Image Preview -->
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

        <!-- FilePond jQuery adapter -->
        <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

        <script>
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
            $.fn.filepond.registerPlugin(FilePondPluginImageExifOrientation);

            $('input.fileupload').filepond({
                server: {
                    process: {
                        url: '{{ route('filepond.process') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                },

                allowMultiple: true,
                allowImageExifOrientation: true,
                allowImagePreview: true,
                imagePreviewHeight: 200
            });
        </script>
    @endpush
@endonce
