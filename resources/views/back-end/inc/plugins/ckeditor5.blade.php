@push('plugins_js')
    <script src="{{ asset('assets/plugins/ckeditor5/ckeditor.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        const editor = document.querySelector('#editor-content');

        if (editor) {
            ClassicEditor.create(editor, {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'alignment',
                        'outdent',
                        'indent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        '|',
                        'undo',
                        'redo',
                        '|',
                        'fontSize',
                        'fontColor',
                        'fontFamily',
                        'fontBackgroundColor',
                        'underline',
                        'highlight',
                        'removeFormat',
                        'findAndReplace',
                        '|',
                        'code',
                    ]
                },
                language: 'ar',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',
                {{--plugins: ['SimpleUploadAdapter'],--}}
                {{--simpleUpload: {--}}
                {{--    uploadUrl: "{{ route('dashboard', ['_token' => csrf_token() ]) }}",--}}
                {{--},--}}
            }).then(editor => {
                window.editor = editor;
            }).catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });
        }
    </script>
@endpush
