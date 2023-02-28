<div class="section section-4">
    <div class="container">
        <div class="row text-center mb-5" data-aos="fade-up">
            <div class="col-lg-6 mx-auto text-center">
                <h3 class="subheading mb-2">Rate</h3>
                <h2 class="heading mb-4">Rate Konversi</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="0">
                        <div class="row">
                            @if(!$simcardproviderwithkurs)
                                <div class="service col-md-12 col-lg-6 d-flex">
                                    <div class="icon">
                                        <span class="flaticon-megaphone"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Segera Datang...</h3>
                                        <p>
                                            Kami sedang mempersiapkan nilai kurs terbaik untuk anda! Silahkan cek kembali beberapa saat lagi.
                                        </p>
                                    </div>
                                </div>
                            @else
                                @foreach ($simcardproviderwithkurs as $scpwk)
                                    @php
                                        $highestrate = array_reduce($scpwk['kurs_rate'], function($carry, $item) {
                                            return $carry > $item['rate'] ? $carry : $item['rate'];
                                        }, 0);
                                    @endphp
                                    <details class="kurs-rate-detail col-md-12 col-lg-6 d-flex">
                                        <summary>
                                            <div class="kurs-rate-simcardprovider d-flex">
                                                <div class="text" style="width: 100%;">
                                                    <h3>{{ $scpwk['simcard_provider_name'] }}</h3>
                                                    <div class="img-wrapper">
                                                        <img alt="logo {{ $scpwk['simcard_provider_name'] }}" src="{{ asset('img/simcard_provider/' . $scpwk['simcard_provider_image']) }}"/>
                                                    </div>
                                                </div>
                                                <h3 class="rate-value">{{ $highestrate }}</h3>
                                            </div>
                                            <i class="bx bx-chevron-down"></i>
                                        </summary>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kurs</th>
                                                    <th scope="col">Rate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($scpwk['kurs_rate'] as $kurs)
                                                    <tr>
                                                        <td>{{ $kurs['nominal'] }}</td>
                                                        <td>{{ $kurs['rate'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </details>

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
