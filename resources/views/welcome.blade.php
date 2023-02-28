<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta charset="utf-8">
        <title>{{
             str_replace('-', ' ', ucwords($page))
            }} &mdash; Konversi Pulsa ke Bentuk Uang (Trusted Since 2017) hanya di DEKConvert</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
        <link rel="canonical" href="{{ env('APP_URL') }}">
        <link rel="image_src" href="{{ asset('img/'.$data_seo['image_src']) }}">
        <meta property="og:site_name" content="{{ $data_seo['og_site_name'] }}">
        <meta property="og:title" content="{{ $data_seo['og_title'] }}">
        <meta property="og:url" content="{{env('APP_URL')}}">
        <meta property="og:type" content="{{ $data_seo['og_type'] }}">
        <meta property="og:description" content="{{$data_seo['og_description']}}">
        <meta property="og:image" content="{{ asset('img/'.$data_seo['og_image']) }}">
        <meta property="og:image:width" content="726">
        <meta property="og:image:height" content="727">
        <meta itemprop="name" content="{{$data_seo['itemprop_name']}}">
        <meta itemprop="url" content="{{ env('APP_URL') }}">
        <meta itemprop="description" content="{{$data_seo['itemprop_description']}}">
        <meta itemprop="thumbnailUrl" content="{{ asset('img/'.$data_seo['itemprop_thumbnail']) }}">
        <meta itemprop="image" content="{{ asset('img/'.$data_seo['itemprop_image']) }}">
        <meta name="twitter:title" content="{{$data_seo['twitter_title']}}">
        <meta name="twitter:url" content="{{ env('APP_URL') }}">
        <meta name="twitter:image" content="{{ asset('img/'.$data_seo['twitter_image']) }}">
        <meta name="twitter:card" content="{{$data_seo['twitter_card']}}">
        <meta name="twitter:description" content="{{$data_seo['twitter_description']}}">
        <meta name="description" content="{{$data_seo['meta_description']}}">
        <meta name="keywords" content="{{$data_seo['meta_keywords']}}">
        <meta name="author" content="Rachmad Nur Hayat">
        <meta name="robots" content="{{$data_seo['meta_robots']}}">
        <meta name="googlebot" content="{{$data_seo['meta_googlebot']}}">
        <meta name="google-site-verification" content="{{$data_seo['meta_google_site_verification']}}">
        <meta name="google-analytics" content="{{$data_seo['meta_google_analytics']}}">
        <meta name="google-search-console" content="{{$data_seo['meta_google_search_console']}}">

        @include('visitor.partials.header')
    </head>
    <body>
        <livewire:visitor.index :page="$page"/>
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        @include('visitor.partials.scripts')
    </body>
</html>
