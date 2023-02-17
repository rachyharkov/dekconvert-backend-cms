@extends('layouts.app')

@section('page-title', 'Kurs Rate')

@section('content')
    <style>
        .btn-remove-kurs-rate {
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
        }
    </style>

    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row">
                <livewire:crud-simcardprovider />
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        function initDataTable() {
            $('#simcard_providers-table').DataTable({
                bLengthChange: false,
                bDestroy: true,
                language:{
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: "Quick Search",
                    paginate: {
                        next: '<i class="ti-angle-right"></i>',
                        previous: '<i class="ti-angle-left"></i>'
                    }
                },
                columnDefs: [
                    { visible: false }
                ],
                responsive: true,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: '{!! route('simcard_provider.index') !!}',
                // disable page, entries, and next/previous buttons
                paging: false,
                info: false,
                columns: [
                        {
                            data: 'simcard_provider_name',
                            name: 'simcard_provider_name'
                        },
                        {
                            data: 'simcard_provider_status',
                            name: 'simcard_provider_status',
                            render: function(data, type, row) {
                                if (data == 1) {
                                    return '<span class="badge bg-success">Aktif</span>'
                                } else {
                                    return '<span class="badge bg-danger">Tidak Aktif</span>'
                                }
                            }
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    scrollY: '50vh',
                    scrollCollapse: true,
            });
        }
        function form_script() {
            $('#simcard_provider_image').on('change', function(e) {
                var s = $(this)[0]

                if (s.files[0].size > 500000) {
                    s.value = ""
                    // frame.style.display = "none"
                    alert("Maksimal lampiran 500 KB")
                    return false
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#frame').attr('src', e.target.result);
                    $('#frame').show();
                }
                reader.readAsDataURL(this.files[0]);
            })
        }

        window.addEventListener('initTableNya', event => {
            initDataTable();
        })

        window.addEventListener('formScript', event => {
            form_script();
        })

        initDataTable();

        $(document).on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Hapus simcard_provider ini?',
                text: "Anda akan kehilangan data kurs rate yang terkait dengan simcard_provider ini! (jika ingin tidak menghapus kurs rate, silahkan ubah status simcard_provider menjadi tidak aktif)",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: "{{ route('simcard_provider.destroy', ':id') }}".replace(':id', id),
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 3000
                                })
                                $('#simcard_providers-table').DataTable().ajax.reload();
                            },
                            error: function(response) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error',
                                })
                            }
                        })
                    })
                },
                allowOutsideClick: false
            })
        })

        $(document).on('change','#simcard_provider_icon', function() {
            var file = $(this)[0].files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-icon').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    </script>
@endpush
