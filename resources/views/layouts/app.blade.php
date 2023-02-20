<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @include('partials.styles')
</head>

<body class="crm_body_bg">
    @include('partials.sidenav')
    <section class="main_content dashboard_part large_header_bg">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')
    </section>
    <div id="back-top" style="display: none">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>
    @include('partials.scripts')
</body>

</html>
