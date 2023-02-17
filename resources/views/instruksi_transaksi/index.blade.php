@extends('layouts.app')

@section('page-title', 'Instruksi Transaksi')

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
    <livewire:instruksi-transaksi />
@endsection

@push('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        function scriptAnu() {
            class myUploadAdapter {
                constructor(loader) {
                    this.loader = loader;
                }

                upload() {
                    return this.loader.file
                        .then(file => new Promise((resolve, reject) => {
                            this._initRequest();
                            this._initListeners(resolve, reject, file);
                            this._sendRequest(file);
                        }));
                }

                abort() {
                    if (this.xhr) {
                        this.xhr.abort();
                    }
                }

                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();

                    xhr.open('POST', "{{ route('instruksi_transaksi.uploadimage', ['_token' => csrf_token()]) }}", true);
                    xhr.responseType = 'json';
                }

                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                    xhr.addEventListener('error', () => reject(genericErrorText));
                    xhr.addEventListener('abort', () => reject());
                    xhr.addEventListener('load', () => {
                        const response = xhr.response;

                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }

                        resolve({
                            default: response.url
                        });
                    });

                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', evt => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }

                _sendRequest(file) {
                    const data = new FormData();

                    data.append('upload', file);
                    this.xhr.send(data);
                }
            }

            function simpleUploadAdapterPlugin(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new myUploadAdapter(loader);
                };
            }

            ClassicEditor
                .create(document.querySelector('#ckeditortextarea'), {
                    extraPlugins: [simpleUploadAdapterPlugin],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            'imageUpload',
                            'undo',
                            'redo',
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
                            instruksi_transaksi_text: editor.getData()
                        }
                        Livewire.emit('saveInstruksiTransaksi', data)

                    });

                    editor.ui.view.toolbar.element.append(saveButton);

                })
                .catch(error => {
                    console.error(error);
                });
        }

        Livewire.on('instruksiTransaksiSaved', event => {
            Toast.fire({
                icon: 'success',
                title: 'Instruksi Transaksi has been saved'
            })

        });
        scriptAnu();
    </script>
@endpush
