<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ __('portfolio.meta.description') }}">
        <meta name="theme-color" content="#0a0715">

        <title>{{ $title ?? __('portfolio.meta.title') }}</title>

        <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon-512.png') }}">
        <link rel="icon" type="image/png" sizes="32x32"  href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16"  href="{{ asset('favicon-16x16.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('favicon-192.png') }}">

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
