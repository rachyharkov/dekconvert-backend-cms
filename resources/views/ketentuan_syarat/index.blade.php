@extends('layouts.app')

@section('page-title', 'Ketentuan Syarat')

@section('content')
    <style>
        .ck-editor__editable {
            height: 60vh;
        }
    </style>
    <livewire:ketentuan-syarat />
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

                    xhr.open('POST', "{{ route('ketentuan_syarat.uploadimage', ['_token' => csrf_token()]) }}", true);
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
                            // add button save
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
                    // set max height to 70vh
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
                            // get data from editor htmlencoded
                            ketentuan_syarat_text: editor.getData()
                        }
                        // console.log(data);
                        Livewire.emit('saveKetentuanSyarat', data)

                    });

                    editor.ui.view.toolbar.element.append(saveButton);

                })
                .catch(error => {
                    console.error(error);
                });
        }

        Livewire.on('ketentuanSyaratSaved', event => {
            Toast.fire({
                icon: 'success',
                title: 'Ketentuan dan syarat has been saved'
            })
            // CKEDITOR.instances.ckeditortextarea.destroy();
            // scriptAnu();

        });
        scriptAnu();

        // console.log(ClassicEditor)
    </script>
@endpush
