<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="d-flex align-items-center">
                    <h3 class="text-white m-0">@yield('page-title')</h3>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">

                    </div>
                    <div class="profile_info">
                        <img src="{{ asset('img/client_img.png') }}" alt="#" />
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p>Admin</p>
                                <h5>{{ Auth::user()->name }}</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
