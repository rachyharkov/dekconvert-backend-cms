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

                                    <div class="service col-md-12 col-lg-6 d-flex">
                                        <div class="icon">
                                            <span class="flaticon-shield"></span>
                                        </div>
                                        <div class="text">
                                            <h3>Design Marketing</h3>
                                            <p>
                                                Far far away, behind the word mountains, far from the
                                                countries Vokalia and Consonantia, there live the blind
                                                texts.
                                            </p>
                                        </div>
                                    </div>

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
