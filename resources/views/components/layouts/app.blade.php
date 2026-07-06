<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ __('portfolio.meta.description') }}">
        <meta name="theme-color" content="#0a0715">

        <title>{{ $title ?? __('portfolio.meta.title') }}</title>

        @fonts
        @fluxAppearance

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen">
        <x-navbar />

        <main>
            {{ $slot }}
        </main>

        <x-footer />

        @fluxScripts
    </body>
</html>
