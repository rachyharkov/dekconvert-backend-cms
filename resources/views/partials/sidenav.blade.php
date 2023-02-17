<nav class="sidebar vertical-scroll ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="img/logo.png" alt="" /></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a href="{{ route('dashboard') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/dashboard.svg" alt="" />
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('simcard_provider.index') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/2.svg" alt="" />
                </div>
                <span>Kurs/Rate</span>
            </a>
        </li>
        <li class="">
            <a href="{{route('social_media.index')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/3.svg" alt="" />
                </div>
                <span>Social Media</span>
            </a>
        </li>
        <li class="">
            <a href="{{route('ketentuan_syarat.index')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/4.svg" alt="" />
                </div>
                <span>Ketentuan Syarat</span>
            </a>
        </li>
        <li class="">
            <a href="{{route('instruksi_transaksi.index')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/5.svg" alt="" />
                </div>
                <span>Instruksi Transaksi</span>
            </a>
        </li>
        <li class="">
            <a href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/7.svg" alt="" />
                </div>
                <span>Testimoni</span>
            </a>
        </li>
        <li class="">
            <a href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/cubes.svg" alt="" />
                </div>
                <span>FAQ</span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/6.svg" alt="" />
                </div>
                <span>Pengaturan</span>
            </a>
            <ul>
                <li><a href="{{route('seo_setting.index')}}">SEO</a></li>
                <li><a href="{{route('contact.index')}}">Kontak</a></li>
                <li><a href="tilt.html">Tentang</a></li>
            </ul>
        </li>
    </ul>
</nav>
