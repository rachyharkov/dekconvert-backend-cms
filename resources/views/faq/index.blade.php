@extends('layouts.app')

@section('page-title', 'Frequently Asked Questions')

@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row">
                <livewire:crud-faq />
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        function initDataTable() {
            $('#faqs-table').DataTable({
                bLengthChange: false,
                bDestroy: true,
                columnDefs: [
                    { visible: false }
                ],
                responsive: true,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: '{!! route('faq.index') !!}',
                // disable page, entries, and next/previous buttons
                paging: false,
                info: false,
                columns: [
                    {
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'answer',
                        name: 'answer',
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
            });
        }

        window.addEventListener('initTableNya', event => {
            initDataTable();
        })

        initDataTable();

        $(document).on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Hapus faq ini?',
                text: "Anda akan kehilangan data faq ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: "{{ route('faq.destroy', ':id') }}".replace(':id', id),
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
                                $('#faqs-table').DataTable().ajax.reload();
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
    </script>
@endpush
