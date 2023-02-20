<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @include('visitor.partials.header')

        <title>Echo &mdash; Free Bootstrap 5 Website Template by Colorlib</title>
    </head>
    <body>
        @include('visitor.components.navbar')
        <livewire:visitor.index />

        @include('visitor.partials.scripts')
    </body>
</html>
