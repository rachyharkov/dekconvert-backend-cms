@extends('layouts.app')

@section('page-title', 'Metode Pembayaran')

@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row">
                <livewire:crud-metodepembayaran />
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        function initDataTable() {
            $('#metode_pembayarans-table').DataTable({
                bLengthChange: false,
                bDestroy: true,
                columnDefs: [
                    { visible: false }
                ],
                responsive: true,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: '{!! route('metode_pembayaran.index') !!}',
                // disable page, entries, and next/previous buttons
                paging: false,
                info: false,
                columns: [
                    {
                        data: 'nama_metode_pembayaran',
                        name: 'nama_metode_pembayaran',
                    },
                    {
                        data: 'jenis_metode_pembayaran',
                        name: 'jenis_metode_pembayaran',
                    },
                    {
                        data: 'nomor_rekening',
                        name: 'nomor_rekening',
                    },
                    {
                        data: 'atas_nama',
                        name: 'atas_nama',
                    },
                    {
                        data: 'biaya_admin',
                        name: 'biaya_admin',
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
                title: 'Hapus metode_pembayaran ini?',
                text: "Anda akan kehilangan data metode_pembayaran ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: "{{ route('metode_pembayaran.destroy', ':id') }}".replace(':id', id),
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
                                $('#metode_pembayarans-table').DataTable().ajax.reload();
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
