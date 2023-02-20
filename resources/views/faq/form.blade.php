<div class="white_box_tittle list_header">
    <h4>{{ $page == 'create' ? 'Add' : 'Edit' }} FAQ</h4>
</div>
<div class="white_box mb_30">
    <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="question">Pertanyaan</label>
            <input type="text" class="form-control" id="question" name="question" placeholder="Enter title" value="{{ $faq['question'] }}">
        </div>
        <div class="form-group mt-2">
            <label for="answer">Jawaban</label>
            <textarea class="form-control" id="answer" name="answer" rows="3">{{ $faq['answer'] }}</textarea>
        </div>
        <div class="form-group mt-2 w-100">

            @if($page == 'edit')
                <input type="hidden" name="id" value="{{ $faq['id'] }}">
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
                    var value = input.val();

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
