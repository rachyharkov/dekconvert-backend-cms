@extends('layouts.app')

@section('page-title', 'Testimoni')

@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row">
                <livewire:crud-testimoni />
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        function initDataTable() {
            $('#testimonis-table').DataTable({
                bLengthChange: false,
                bDestroy: true,
                columnDefs: [
                    { visible: false }
                ],
                responsive: true,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: '{!! route('testimoni.index') !!}',
                // disable page, entries, and next/previous buttons
                paging: false,
                info: false,
                columns: [
                    {
                        data: 'name',
                        name: 'name',
                        render: function(data, type, row) {
                            return data.length > 50 ? data.substr(0, 50) + '...' : data;
                        }
                    },
                    {
                        data: 'rating',
                        name: 'rating'
                    },
                    {
                        data: 'comment',
                        name: 'comment',
                        render: function(data, type, row) {
                            return data.length > 50 ? data.substr(0, 50) + '...' : data;
                        }
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
                title: 'Hapus testimoni ini?',
                text: "Anda akan kehilangan data testimoni ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: "{{ route('testimoni.destroy', ':id') }}".replace(':id', id),
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
                                $('#testimonis-table').DataTable().ajax.reload();
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
