<div class="page-content">
    <h5 class="text-end">{{$titlenya}}</h5>
    <form id="formnya" action="{{ route('kurs-rate.update', $id_simcard_provider) }}" method="POST">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-block" wire:click="setPage('index')">Cancel</button>
        <div class="input-group-custom mb-3 d-flex justify-content-around">
            <h5 class="mb-0">Nominal</h5>
            <h5 class="mb-0">Rate</h5>
        </div>
        <ul style="padding: 0; list-style: none;" id="kurs-rate-list">
            @if($kurs_rate_data)
                @foreach ($kurs_rate_data as $krd)
                    <li class="input-group-custom mb-3 d-flex kurs-rate-element" id="kurs-rate-element-1">
                        <input type="text" class="form-control" placeholder="nominal" value="{{$krd['nominal']}}" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="nominal[]" required>
                        <div class="input-group-append">
                            <span class="input-group-text" style="height: 100%;border-radius: 0px;"><i class="fa fa-exchange-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="rate" value="{{$krd['rate']}}" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;" name="rate[]" required>
                        <button type="button" class="btn btn-danger btn-remove-kurs-rate">Remove</button>
                    </li>
                @endforeach
            @endif
        </ul>
        <div style="text-align: center; width: 100%;">
            <button type="button" class="btn btn-block btn-success btn-add-kursrate"><i class="fa fa-plus"></i></button>
        </div>
    </form>
    <script>
        $(document).ready(function() {

            function addKursRateElement() {
                var wrapper = $('#kurs-rate-list')
                var urutan = wrapper.find('.kurs-rate-element').length + 1
                // wrapper.find('.kurs-rate-element').each(function(index, element) {
                //     var id = $(element).attr('id').split('-')[3]
                //     var newId = parseInt(id) + 1
                //     $(element).attr('id', 'kurs-rate-element-' + newId)
                // })

                wrapper.append(`
                    <div class="input-group-custom mb-3 d-flex kurs-rate-element" id="kurs-rate-element-${urutan}">
                        <input type="text" class="form-control" placeholder="nominal" value="50000" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="nominal[]" required>
                        <div class="input-group-append">
                            <span class="input-group-text" style="height: 100%;border-radius: 0px;"><i class="fa fa-exchange-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="rate" value="0.8" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;" name="rate[]" required>
                        <button type="button" class="btn btn-danger btn-remove-kurs-rate">Remove</button>
                    </div>
                `)
            }

            function removeKursRateElement(element) {
                $(element).parent().remove()
            }

            $('.btn-add-kursrate').click(function() {
                addKursRateElement()
            })

            $(document).on('click','.btn-remove-kurs-rate', function() {
                removeKursRateElement(this)
            })

            $('#formnya').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var formdata = new FormData();

                // disable submit button
                // form.find('button[type=submit]').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Loading...');

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

                // console.log(formdata.getAll('nominal[]'));
                // console.log(formdata.getAll('rate[]'));

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
                        form.find('button[type=submit]').prop('disabled', false).html('<i class="fa fa-save"></i> Save');
                    }
                });
            });
        })
    </script>
</div>
