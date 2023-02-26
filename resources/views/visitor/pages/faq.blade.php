<div class="hero-section">
    <style>
        .transition,
        ul.my-accrodion li i:before,
        ul.my-accrodion li i:after,
        p {
            transition: all 0.25s ease-in-out;
        }

        .flipIn,
        ul.my-accrodion li,
        h1 {
            animation: flipdown 0.5s ease both;
        }

        .no-select,
        h2 {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        p {
            color: rgba(48, 69, 92, 0.8);
            font-size: 17px;
            line-height: 26px;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            max-height: 800px;
            opacity: 1;
            transform: translate(0, 0);
            margin-top: 14px;
            z-index: 2;
        }

        ul.my-accrodion {
            list-style: none;
            perspective: 900;
            padding: 0;
            margin: 0;
        }

        ul.my-accrodion li {
            position: relative;
            padding: 0;
            margin: 0;
            padding-bottom: 4px;
            padding-top: 18px;
            border-top: 1px dotted #dce7eb;
        }

        ul.my-accrodion li:nth-of-type(1) {
            animation-delay: 0.5s;
        }

        ul.my-accrodion li:nth-of-type(2) {
            animation-delay: 0.75s;
        }

        ul.my-accrodion li:nth-of-type(3) {
            animation-delay: 1s;
        }

        ul.my-accrodion li:last-of-type {
            padding-bottom: 0;
        }

        ul.my-accrodion li i {
            position: absolute;
            transform: translate(-6px, 0);
            margin-top: 16px;
            right: 0;
        }

        ul.my-accrodion li i:before,
        ul.my-accrodion li i:after {
            content: "";
            position: absolute;
            background-color: #ff6873;
            width: 3px;
            height: 9px;
        }

        ul.my-accrodion li i:before {
            transform: translate(-2px, 0) rotate(45deg);
        }

        ul.my-accrodion li i:after {
            transform: translate(2px, 0) rotate(-45deg);
        }

        ul.my-accrodion li input[type=checkbox] {
            position: absolute;
            cursor: pointer;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0;
        }

        ul.my-accrodion li input[type=checkbox]:checked~p {
            margin-top: 0;
            max-height: 0;
            opacity: 0;
            transform: translate(0, 50%);
        }

        ul.my-accrodion li input[type=checkbox]:checked~i:before {
            transform: translate(2px, 0) rotate(45deg);
        }

        ul.my-accrodion li input[type=checkbox]:checked~i:after {
            transform: translate(-2px, 0) rotate(-45deg);
        }

        @keyframes flipdown {
            0% {
                opacity: 0;
                transform-origin: top center;
                transform: rotateX(-90deg);
            }

            5% {
                opacity: 1;
            }

            80% {
                transform: rotateX(8deg);
            }

            83% {
                transform: rotateX(6deg);
            }

            92% {
                transform: rotateX(-3deg);
            }

            100% {
                transform-origin: top center;
                transform: rotateX(0deg);
            }
        }
    </style>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <span class="subheading mb-2" data-aos="fade-up">FAQ</span>
                <h1 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">
                    Ada pertanyaan? Kami siap menjawabnya
                </h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    Kebanyakan kalian yang tiba disini adalah yang baru pertama kali memanfaatkan jasa convert pulsa,
                    atau memang sedang memiliki pertanyaan? Berikut adalah pertanyaan yang sering diajukan oleh calon
                    pelanggan kami akhir-akhir ini.
                </p>
                <p data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="btn btn-primary mr-2">FAQ</a>
                    <a href="#" class="btn btn-outline-primary">Convert Sekarang!</a>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="img-wrap" data-aos="fade-left">
                    <img src="visitor_assets/images/faq.png" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-3 pt-0">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12" data-aos="fade-up">
                @if($faq_list)
                    @foreach ($faq_list as $f)
                        <ul class="my-accrodion">
                            <li>
                                <input type="checkbox" checked>
                                <i></i>
                                <h2>{{$f['question']}}</h2>
                                <p>{{ $f['answer'] }}</p>
                            </li>
                        </ul>
                    @endforeach
                @else
                    <div class="alert alert-danger">
                        <strong>Maaf!</strong> Belum ada pertanyaan yang diajukan atau admin belum mempersiapkannya. Silahkan hubungi admin untuk info lebih lanjut.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
