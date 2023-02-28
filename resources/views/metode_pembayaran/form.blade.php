<div class="white_box_tittle list_header">
    <h4>{{ $page == 'create' ? 'Add' : 'Edit' }} Metode Pembayaran</h4>
</div>
<div class="white_box mb_30">
    <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="nama_metode_pembayaran">Nama Metode Pembayaran</label>
            <input type="text" class="form-control" id="nama_metode_pembayaran" name="nama_metode_pembayaran" value="{{ $metode_pembayaran['nama_metode_pembayaran'] }}">
        </div>
        <div class="form-group mt-2">
            <label for="jenis_metode_pembayaran">Jenis Metode Pembayaran</label>
            <select name="jenis_metode_pembayaran" id="jenis_metode_pembayaran" class="form-control">
                @php
                    $jenis_metode_pembayaran_e = ['Bank','E-Wallet'];
                @endphp
                @foreach ($jenis_metode_pembayaran_e as $item)
                    <option value="{{ $item }}" {{ $item == $metode_pembayaran['jenis_metode_pembayaran'] ? 'selected' : '' }}>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="nomor_rekening">No. Rekening</label>
            <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" value="{{ $metode_pembayaran['nomor_rekening'] }}">
        </div>
        <div class="form-group mt-2">
            <label for="atas_nama">Atas Nama</label>
            <input type="text" class="form-control" id="atas_nama" name="atas_nama" value="{{ $metode_pembayaran['atas_nama'] }}">
        </div>
        <div class="form-group mt-2">
            <label for="biaya_admin">Biaya admin</label>
            <input type="number" class="form-control" id="biaya_admin" name="biaya_admin" value="{{ $metode_pembayaran['biaya_admin'] }}">
        </div>
        <div class="form-group mt-2">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Enter title" accept="image/*">
            <img id="frame" src="{{ asset('img/metode_pembayaran/'.$metode_pembayaran['gambar']) }}" style="width: 10rem; margin-top: 10px; display: {{ $metode_pembayaran['gambar'] ? 'block' : 'none' }}">
        </div>

        <div class="form-group mt-2 w-100">

            @if($page == 'edit')
                <input type="hidden" name="metode_pembayaran_id" value="{{ $metode_pembayaran['id'] }}">
                <input type="hidden" name="gambar_old" value="{{ $metode_pembayaran['gambar'] }}">
            @endif

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <button type="button" wire:click="setPage('index')" class="btn btn-default">Cancel</button>
        </div>
    </form>
    <script>
        $(document).ready(function() {

            function cleanAllErrorIndicator() {
                // remove all error indicator
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').html('');
            }

            $('#formnya').submit(function(e) {
                e.preventDefault();

                cleanAllErrorIndicator();

                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var formdata = new FormData();

                // disable submit button
                form.find('button[type=submit]').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Loading...');

                // get all input
                form.find('input, select, textarea').each(function() {
                    var input = $(this);
                    var name = input.attr('name');
                    var value = null;

                    if (input.attr('type') == 'file') {
                        value = input.prop('files')[0];
                    } else {
                        value = input.val();
                    }

                    formdata.append(name, value);
                });

                // get all file

                $.ajax({
                    type: method,
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // trigger event setMenu with parameter 'index'
                        window.livewire.emit('setPage', 'index');

                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil menyimpan data'
                        })
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: 'Error!',
                            text: response.responseJSON.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                        // make input to red
                        $.each(response.responseJSON.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).closest('.form-group').find('.invalid-feedback').html(value);
                        });

                        // enable submit button
                        form.find('button[type=submit]').prop('disabled', false).html('<i class="fa fa-save"></i> Save');
                    }
                });
            });
        })
    </script>
</div>
