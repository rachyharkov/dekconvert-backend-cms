<div>
    @include('visitor.components.navbar')
    @if ($page == 'home')

        @include('visitor.components.hero-section')
        @include('visitor.components.second-section')
        @include('visitor.components.third-section')
        @include('visitor.components.fourth-section')
        @include('visitor.components.fifth-section')

        <script>
            window.addEventListener('load', function () {
                // initSplide();
            })
        </script>
    @elseif ($page == 'tentang')
        @include('visitor.pages.tentang')
    @elseif ($page == 'testimoni')
        @include('visitor.pages.testimonial')
        @elseif($page == 'faq')
        @include('visitor.pages.faq')
    @elseif ($page == 'syarat-dan-ketentuan')
        @include('visitor.pages.syarat-ketentuan')
    @elseif ($page == 'kebijakan-privasi')
        <p>Sedang dipersiapkan</p>
    @elseif ($page == 'kalkulator')
        @include('visitor.pages.kalkulator')
    @else
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="height: 80vh;display: flex;flex-direction: column;justify-content: center;">
                        <h1 class="text-center">404</h1>
                        <h2 class="text-center">Halaman tidak ditemukan</h2>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @include('visitor.components.footer-section')
    <div class="float-link">
        <a href="https://api.whatsapp.com/send?phone=6281211111111&text=Halo%20Admin%20Saya%20ingin%20bertanya%20tentang%20produk%20Anda" target="_blank" class="float-link-item">
            <i class="bx bxl-whatsapp"></i>
        </a>
        <p>Ada yang bisa kami bantu?</p>
    </div>

    @push('js')
        <script src="{{ asset('visitor_assets/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('visitor_assets/js/aos.js') }}"></script>
        <script src="{{ asset('visitor_assets/js/navbar.js') }}"></script>
        <script src="{{ asset('visitor_assets/js/counter.js') }}"></script>
        <script src="{{ asset('visitor_assets/js/custom.js') }}"></script>
        <script>
            $(document).ready(function() {
                const segmenttwoofurl = window.location.pathname.split('/')[1];
                const page = segmenttwoofurl ? segmenttwoofurl : 'home';
                console.log(page + ' loaded');
                $('.site-nav #menu-' + page).addClass('active')
            })
        </script>
    @endpush
</div>
