@extends('layouts.app')

@section('page-title', 'Tentang')

@section('content')
    <style>
        .ck-editor__editable {
            height: 60vh;
        }

        .ck-editor__editable ul {
            padding: revert;
        }

        .ck-editor__editable ol {
            padding: revert;
        }

        .ck-editor__editable ul li {
            list-style-type: disc;
        }

        .ck-editor__editable ol li {
            list-style-type: decimal;
        }
    </style>
    <livewire:about />
@endsection

@push('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        function scriptAnu() {
            ClassicEditor
                .create(document.querySelector('#ckeditortextarea'), {
                    toolbar: {
                        items: [
                            'save'
                        ]
                    },
                    language: 'id',
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    height: '70vh',
                    licenseKey: '',
                })
                .then(editor => {
                                    // add button save
                    const saveButton = document.createElement('button');
                    saveButton.type = 'button';
                    saveButton.classList.add('ck', 'ck-button', 'ck-save-button');
                    saveButton.innerHTML = 'Save';
                    saveButton.addEventListener('click', () => {
                        const data = {
                            about_text: editor.getData()
                        }
                        Livewire.emit('saveAbout', data)

                    });

                    editor.ui.view.toolbar.element.append(saveButton);

                })
                .catch(error => {
                    console.error(error);
                });
        }

        Livewire.on('AboutTextSaved', event => {
            Toast.fire({
                icon: 'success',
                title: 'Instruksi Transaksi has been saved'
            })

        });
        scriptAnu();
    </script>
@endpush
