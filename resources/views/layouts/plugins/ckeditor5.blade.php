@once
    @push('scripts')
        <script src="{{ asset('adminlte/plugins/ckeditor5/build/ckeditor.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/ckeditor5/build/translations/en.js') }}"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('.ckeditor'), {
                    toolbar: {
                        items: ['heading','|','bold','italic','underline','strikethrough','|','subscript','superscript','link','bulletedList','numberedList','|','alignment','outdent','indent','|','blockQuote','undo','redo','findAndReplace','|','sourceEditing','removeFormat']
                    },
                    language: 'en',
                    licenseKey: '',
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error('Oops, something went wrong!');
                    console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                    console.warn('Build id: b2dqkylaq01y-8pyzach3mo77');
                    console.error(error);
                });
        </script>
    @endpush
@endonce
