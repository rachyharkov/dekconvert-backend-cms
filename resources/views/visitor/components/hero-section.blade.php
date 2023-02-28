<div class="hero-section">
    <style>
        .img-wrap {
            position: relative;
            height: 400px;
        }

        .img-wrap img:nth-child(1) {
            position: absolute;
            bottom: 129px;
            left: 2rem;
            width: 30%;
            z-index: 2;
            animation: move 3s infinite;
        }

        .img-wrap img:nth-child(2) {
            position: absolute;
            width: 100%;
            bottom: 0px;
        }
        @keyframes move {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <span class="subheading mb-2" data-aos="fade-up">Terpercaya Sejak 2017</span>
                <h1 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">
                    Jasa Convert Pulsa atau Tukar Pulsa ke <span id="text-provider-changed">Wallet Pilihanmu!</span>
                </h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    Dek Convert merupakan penyedia jasa convert pulsa, tukar pulsa, sulap pulsa ke uang atau saldo rekening dengan rate tinggi, cepat dan aman. Bisa juga tukar pulsa ke saldo E-Wallet seperti <span style="color: #4b2489">OVO</span>, <span style="color: #00aad8">Gopay</span>, <span style="color: #00aad8">Dana</span>, <span style="color: #e12428">LinkAja</span>, <span style="color: #ee4d2d">ShopeePay</span> dan Lainnya.
                </p>
                <p data-aos="fade-up" data-aos-delay="300">
                    <a href="https://api.whatsapp.com/send?phone={{ $main_whatsapp_number }}&text=Halo%20Admin%20Saya%20ingin%20convert%20pulsa%20sekian" class="btn btn-primary mr-2"><i class="bx bxl-whatsapp" style="
                        padding: 5px;
                        position: absolute;
                        top: -11px;
                        left: -7px;
                        background: #25d366;
                        border-radius: 50%;
                        font-size: 21px;
                        "></i> Convert Sekarang!</a>
                    <a href="faq" class="btn btn-outline-primary">
                        <span class="icon-arrow-right small"></span>
                        Kunjungi FAQ
                    </a>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="img-wrap" style="position: relative;overflow: hidden;" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('visitor_assets/images/women.png') }}" alt="Image" class="img-fluid" />
                    <img src="{{ asset('visitor_assets/images/shape_01.png') }}" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {
                function changetexteffect() {
                    var text = [
                        {
                            'namaprovider': 'OVO',
                            'color': '#4b2489'
                        },
                        {
                            'namaprovider': 'Gopay',
                            'color': '#00aad8'
                        },
                        {
                            'namaprovider': 'Dana',
                            'color': '#00aad8'
                        },
                        {
                            'namaprovider': 'LinkAja',
                            'color': '#e12428'
                        },
                        {
                            'namaprovider': 'ShopeePay',
                            'color': '#ee4d2d'
                        }
                    ];
                    var i = 0;
                    setInterval(function() {
                        $('#text-provider-changed').fadeOut(500, function() {
                            $(this).text(text[i].namaprovider).css('color', text[i].color).fadeIn(500);
                        });
                        i = (i + 1) % text.length;
                    }, 3000);
                }

                changetexteffect();
            })
        </script>
    @endpush
</div>
