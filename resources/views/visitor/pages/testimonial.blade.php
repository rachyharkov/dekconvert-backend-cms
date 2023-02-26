<div class="hero-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <span class="subheading mb-2" data-aos="fade-up">Testimonial</span>
                <h1 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">
                    Kami menjadi terpercaya berkat testimonial dari pelanggan kami
                </h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    DEKConvert adalah layanan konversi pulsa elektrik ke uang tunai yang terpercaya dan terbaik sejak 2017, tidak heran banyak pelanggan yang memberikan testimonial kepada kami, berikut adalah pengalaman dari banyak customer yang sudah kami layani.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="img-wrap" data-aos="fade-left">
                    <img src="visitor_assets/images/5385896.png" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-3 pt-0">
    <style>
        .testimonial {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            position: relative;
            margin-top: 2rem;
            max-width: 80%;
            margin: auto;
        }

        .testimonial p {
            font-size: 17px;
            font-style: italic;
            line-height: 1.8;
            margin-bottom: 0;
            text-align: center;
        }

        .testimonial p::before {
            font-family: 'icomoon' !important;
            content: "\f10d";
            font-size: 30px;
            color: #c2c2c2;
            position: absolute;
            top: -10px;
            left: -10px;
        }

        .testimonial p::after {
            font-family: 'icomoon' !important;
            content: "\f10e";
            font-size: 30px;
            color: #c2c2c2;
            position: absolute;
            bottom: 85px;
            right: 0px;
        }

        .testimonial p:nth-child(2) {
            margin-bottom: 0;
            font-weight: 700;
            font-style: inherit;
        }

        .testimonial .rating-wrap {
            margin-top: 20px;
            justify-content: center;
        }

        .testimonial .rating-wrap .icon-star {
            color: #FFD700;
        }
    </style>
    <div class="container">
        <div class="row justify-content-between">
            @if($testimonial)
                @foreach($testimonial as $t)
                    <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up">
                        <div class="testimonial">
                            <p>{{ $t['comment'] }}</p>
                            <p>{{ $t['name'] }}</p>
                            <div class="d-flex rating-wrap">
                                @for ($i = 0; $i < $t['rating']; $i++)
                                    <i class="icon-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up">
                    <div class="testimonial">
                        <p>Testimoni sedang kami kumpulkan, nantikan review dari para pelanggan kami!</p>
                    </div>
                </div>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 text-center" data-aos="fade-up">
                <p>Ingin memberikan testimonial atas layanan kami? sampaikan via WhatsApp <a href="https://wa.me/6281211111111">0812-1111-1111</a> atau isi form testimonial pada tombol di bawah ini.</p>
                <a href="https://wa.me/6281211111111" class="btn btn-primary">Kirim Testimonial</a>
            </div>
        </div>
    </div>
</div>
