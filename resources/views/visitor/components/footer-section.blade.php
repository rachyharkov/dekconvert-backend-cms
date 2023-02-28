<div class="site-footer">
    <link rel="stylesheet" href="{{ asset('vendors/boxicons/css/boxicons.css') }}">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="widget">
                    <h3 class="heading">Tentang DekConvert</h3>
                    <div><?= html_entity_decode($about_text) ?></div>
                </div>
                <div class="widget">
                    <ul class="list-unstyled social">
                        @if($social_media)
                            @foreach ($social_media as $sm)
                                <li>
                                    <a href="{{$sm['social_media_url']}}"><i class="{{$sm['social_media_icon']}}"></i></a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 pl-lg-5">
                <div class="widget">
                    <h3 class="heading">Pages</h3>
                    <ul class="links list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Tentang DEKConvert</a></li>
                        <li><a href="#">Syarat Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="widget">
                    <h3 class="heading">Resources</h3>
                    <ul class="links list-unstyled">
                        <li><a href="#">Cara Memanfaatkan Jasa Kami</a></li>
                        <li><a href="#">Provider Didukung</a></li>
                        <li><a href="#">Cara Transfer Pulsa</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="widget">
                    <h3 class="heading">Contact</h3>
                    <ul class="list-unstyled quick-info links">
                        @foreach ($contact_information as $ci)
                            <li class="{{$ci['type']}}">
                                <a href="{{$ci['type'] == 'email' ? 'mailto:' . $ci['value'] : $ci['value']}}">{{$ci['value']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | made with
                    <i class="icon-heart text-danger" aria-hidden="true"></i> by
                    <a href="https://rnh-is.me" target="_blank" rel="nofollow noopener">rachyharkov</a>
                </p>
            </div>
        </div>
    </div>
</div>
