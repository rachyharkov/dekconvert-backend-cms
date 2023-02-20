<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<nav class="site-nav mt-3">
    <div class="container">
        <div class="site-navigation">
            <a href="index.html" class="logo m-0 mt-2 float-start"><img src="{{ asset('img/logo-web.png') }}" alt="Image"
                    class="img-fluid" /></a>
            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                <li class="active"><a href="index.html">Home</a></li>
                {{-- <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li class="has-children">
                            <a href="#">Menu Two</a>
                            <ul class="dropdown">
                                <li><a href="#">Sub Menu One</a></li>
                                <li><a href="#">Sub Menu Two</a></li>
                                <li><a href="#">Sub Menu Three</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Menu Three</a></li>
                    </ul>
                </li> --}}
                <li><a href="about.html">Tentang Kami</a></li>
                <li><a href="services.html">Testimoni</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="contact.html">Syarat & Ketentuan</a></li>
                {{-- <li class="cta-button"><a href="#">Download now</a></li> --}}
            </ul>
            <a href="#"
                class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
    </div>
</nav>
