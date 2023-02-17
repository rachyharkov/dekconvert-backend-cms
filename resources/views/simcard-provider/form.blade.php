
<div class="page-content">
    <div class="card" style="overflow: hidden;">
        <div class="card-body">
            <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                <div class="form-group mt-2">
                    <label for="simcard_provider_name">Provider Name</label>
                    <input type="text" class="form-control" id="simcard_provider_name" name="simcard_provider_name" placeholder="Enter title" value="{{ $simcard_provider_name }}">
                </div>
                <div class="form-group mt-2">
                    <label for="simcard_provider_keterangan">Keterangan</label>
                    <textarea class="form-control" id="simcard_provider_keterangan" name="simcard_provider_keterangan" rows="3">{{ $simcard_provider_keterangan }}</textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="simcard_provider_image">Gambar</label>
                    <input type="file" class="form-control" id="simcard_provider_image" name="simcard_provider_image" placeholder="Enter title" accept="image/*">
                    <img id="frame" src="{{ asset('img/simcard_provider/'.$simcard_provider_image) }}" style="width: 10rem; margin-top: 10px; display: {{ $simcard_provider_image ? 'block' : 'none' }}">
                </div>
                <div class="form-group mt-2 w-100">

                    @if($page == 'edit')
                        <input type="hidden" name="simcard_provider_id" value="{{ $id_simcard_provider }}">
                        <input type="hidden" name="simcard_provider_image_old" value="{{ $simcard_provider_image }}">
                    @endif
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-warning btn-reset"><i class="fa fa-undo"></i> Reset</button>
                    <button type="button" wire:click="setPage('index')" class="btn btn-default">Cancel</button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            function cleanAllErrorIndicator() {
                // remove all error indicator
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').html('');
            }

            $('.btn-reset').click(function(e) {
                e.preventDefault();
                $('#formnya')[0].reset();
                cleanAllErrorIndicator();
                $('#frame').hide();
            });

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

                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            timer: 3000
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
                        form.find('button[type=submit]').prop('disabled', false).html('<i class="fa fa-paper-plane"></i> Publish');
                    }
                });
            });
        })
    </script>
</div>
