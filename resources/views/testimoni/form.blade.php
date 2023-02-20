<div class="white_box_tittle list_header">
    <h4>{{ $page == 'create' ? 'Add' : 'Edit' }} testimoni</h4>
</div>
<div class="white_box mb_30">
    <style>
        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 50px;
            width: max-content;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked~.icon,
        .rating:hover label:hover input~.icon {
            color: #ffbf43
        }

        .rating label input:focus:not(:checked)~.icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #ffbf43;
        }
    </style>
    <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter title"
                value="{{ $testimoni['name'] }}">
        </div>
        <div class="form-group mt-2">
            <p>Rating</p>
            <div class="input-group rating">
                <label>
                    <input type="radio" name="rating" value="1" @if($testimoni['rating'] == 1) checked @endif />
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="2" @if($testimoni['rating'] == 2) checked @endif />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="3" @if($testimoni['rating'] == 3) checked @endif />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="4" @if($testimoni['rating'] == 4) checked @endif />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="rating" value="5" @if($testimoni['rating'] == 5) checked @endif />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
            </div>
        </div>
        <div class="form-group mt-2">
            <label for="comment">Komentar/Testimoni</label>
            <textarea class="form-control" id="comment" name="comment" rows="3">{{ $testimoni['comment'] }}</textarea>
        </div>
        <div class="form-group mt-2 w-100">

            @if ($page == 'edit')
                <input type="hidden" name="id" value="{{ $testimoni['id'] }}">
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

            $('.rating input').change(function() {
                // clear all checked
                $('.rating input').removeAttr('checked').prop('checked', false);

                // set checked
                $(this).attr('checked', 'checked').prop('checked', true);
            });

            $('#formnya').submit(function(e) {
                e.preventDefault();

                cleanAllErrorIndicator();

                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var formdata = new FormData();

                // disable submit button
                form.find('button[type=submit]').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                // get all input include file and radio checked
                form.find('input, textarea, select').each(function() {
                    if ($(this).attr('type') == 'file') {
                        // get all file
                        $.each($(this)[0].files, function(i, file) {
                            formdata.append($(this).attr('name'), file);
                        });
                    } else if ($(this).attr('type') == 'radio') {
                        // get radio checked
                        if ($(this).is(':checked')) {
                            formdata.append($(this).attr('name'), $(this).val());
                        }
                    } else {
                        // get all input
                        formdata.append($(this).attr('name'), $(this).val());
                    }
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
                            $('#' + key).closest('.form-group').find(
                                '.invalid-feedback').html(value);
                        });

                        // enable submit button
                        form.find('button[type=submit]').prop('disabled', false).html(
                            '<i class="fa fa-save"></i> Save');
                    }
                });
            });
        })
    </script>
</div>
