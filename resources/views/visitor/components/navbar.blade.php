<div style="position: sticky;
top: 0;
z-index: 999;">
    <div class="site-mobile-menu site-navbar-target bg-white">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="/" class="logo m-0 mt-2 float-start"><img src="{{ asset('img/dek-convert-logo.png') }}" alt="Image"
                        class="img-fluid" style="transform: scale(1.5) translateY(-4px); width: 66px;" /></a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li id="menu-home"><a href="home">Home</a></li>
                    <li id="menu-tentang"><a href="tentang">Tentang Kami</a></li>
                    {{-- <li id="menu-testimoni"><a href="testimoni">Testimoni</a></li> --}}
                    <li id="menu-faq"><a href="faq">FAQ</a></li>
                    <li id="menu-syarat-dan-ketentuan"><a href="syarat-dan-ketentuan">Syarat & Ketentuan</a></li>
                    <li class="cta-button"><a href="kalkulator">Kalkulator Convert</a></li>
                </ul>
                <a href="#"
                    class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </nav>
</div>
