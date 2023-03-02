<div class="white_box mb_30">
    <style>
        /* Chrome, Safari, Edge, Opera */
        .input-group-custom input::-webkit-outer-spin-button,
        .input-group-custom input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        /* Firefox */
        .input-group-custom input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <h5 class="text-end">{{$titlenya}}</h5>
    <form id="formnya" action="{{ route('kurs-rate.update', $id_simcard_provider) }}" method="POST">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-block" wire:click="setPage('index')">Cancel</button>
        <div class="mb-3 d-flex justify-content-around">
            <h5 class="mb-0">Nominal</h5>
            <h5 class="mb-0">Rate</h5>
        </div>
        <ul style="padding: 0; list-style: none;" id="kurs-rate-list">
            @if($kurs_rate_data)
                @foreach ($kurs_rate_data as $krd)
                    <li class="input-group-custom mb-3 d-flex kurs-rate-element" id="kurs-rate-element-1">
                        <button type="button" class="btn btn-change-mode-nominal"><i class="fas fa-sync"></i></button>
                            @php
                                $nominalnya = $krd['nominal'];
                                $split_nominalnya = explode(' ', $nominalnya);
                            @endphp

                            @if (count($split_nominalnya) > 2)
                                <div class="input-nominalnya input-group d-flex w-100" data-mode="single">
                                    <input type="hidden" name="operand[]" value="FALSE">
                                    <input type="number" class="form-control" placeholder="nominal" value="{{$split_nominalnya[0]}}" name="nominal_1[]" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="height: 100%;border-radius: 0px;">{{$split_nominalnya[1]}}</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="nominal" value="{{$split_nominalnya[2]}}" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="nominal_2[]" required>
                                </div>
                            @else
                                <div class="input-nominalnya input-group d-flex w-100" data-mode="ranged">
                                    <select class="form-control" name="operand[]" style="max-width: 80px;text-align: center;">
                                        <option value="<=" @if ($split_nominalnya[0] == '<=') selected @endif><=</option>
                                        <option value="<" @if ($split_nominalnya[0] == '<') selected @endif><</option>
                                        <option value=">" @if ($split_nominalnya[0] == '>') selected @endif>></option>
                                        <option value=">=" @if ($split_nominalnya[0] == '>=') selected @endif>>=</option>
                                    </select>
                                    <input type="number" class="form-control" placeholder="nominal" value="{{$split_nominalnya[1]}}" name="nominal_1[]" required style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;">
                                    <input type="hidden" name="nominal_2[]" value="FALSE">
                                </div>
                            @endif
                        <div class="input-group-append">
                            <span class="input-group-text" style="height: 100%;border-radius: 0px;"><i class="fa fa-exchange-alt"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="rate" value="{{$krd['rate']}}" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="rate[]" required pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
                        title="Harus berupa angka dan menggunakan titik atau koma sebagai pemisah desimal"/>
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
                    <li class="input-group-custom mb-3 d-flex kurs-rate-element" id="kurs-rate-element-${urutan}">
                        <button type="button" class="btn btn-change-mode-nominal"><i class="fas fa-sync"></i></button>
                        <div class="input-nominalnya d-flex w-100 input-group" data-mode="single">
                            <select class="form-control" name="operand[]" style="max-width: 80px; text-align: center;">
                                <option value="<="><=</option>
                                <option value="<"><</option>
                                <option value=">">></option>
                                <option value=">=">>=</option>
                            </select>
                            <input type="number" class="form-control" placeholder="nominal" value="0" name="nominal_1[]" required>
                            <input type="hidden" name="nominal_2[]" value="FALSE">
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" style="height: 100%;border-radius: 0px;"><i class="fa fa-exchange-alt"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="rate" value="0" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="rate[]" required pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
                        title="Harus berupa angka dan menggunakan titik atau koma sebagai pemisah desimal"/>
                        <button type="button" class="btn btn-danger btn-remove-kurs-rate">Remove</button>
                    </li>
                `)
            }

            function removeKursRateElement(element) {
                $(element).parent().remove()
            }

            function changeModeNominal(element) {
                var element_wrapper = $(element).parent().find('.input-nominalnya')
                var mode = element_wrapper.attr('data-mode')

                if (mode == 'single') {
                    element_wrapper.attr('data-mode', 'ranged')
                    element_wrapper.html(`
                        <select class="form-control" name="operand[]" style="max-width: 80px; text-align: center;">
                            <option value="<="><=</option>
                            <option value="<"><</option>
                            <option value=">">></option>
                            <option value=">=">>=</option>
                        </select>
                        <input type="number" class="form-control" placeholder="nominal" value="0" name="nominal_1[]" required>
                        <input type="hidden" name="nominal_2[]" value="FALSE">
                    `)
                } else {
                    var operand = element_wrapper.find('select').val()
                    var nominalnya = element_wrapper.find('input').val()
                    element_wrapper.attr('data-mode', 'single')
                    element_wrapper.html(`
                        <input type="hidden" name="operand[]" value="FALSE">
                        <input type="number" class="form-control" placeholder="nominal" value="0" name="nominal_1[]" required>
                        <div class="input-group-append">
                            <span class="input-group-text" style="height: 100%;border-radius: 0px;">-</span>
                        </div>
                        <input type="number" class="form-control" placeholder="nominal" value="0" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="nominal_2[]" required>
                    `)
                }
            }

            $(document).on('click', '.btn-change-mode-nominal', function() {
                changeModeNominal(this)
            })

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
