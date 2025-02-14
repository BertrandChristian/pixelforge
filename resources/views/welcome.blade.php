@extends('layouts.master')
@section('title', 'PixelForge')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PixelForge</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <img id="background" class="absolute w-full h-full object-cover" src="{{ asset('image/ball.jpg') }}" alt="welcome background" />
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <div class="flex lg:justify-center lg:col-start-2">
                    <img class="logo-pixelforge-2 w-44 lg:w-56" src="{{ asset('image/logo_pixelforge_complete.png') }}" alt="Logo PixelForge">
                </div>
            </header>

            <main class="py-16 text-center text-sm">
                <a href="{{ route('dashboard') }}" class="inline-block rounded-full bg-gradient-to-r from-red-500 to-orange-500 text-white text-lg font-semibold px-6 py-3 transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                    ENTER
                </a>
            </main>

            <footer class="py-16 text-center text-white text-lg font-medium">
                PixelForge
            </footer>
        </div>
    </div>
</div>
</body>

</html>
