<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_web.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Industrial Games') }}</title>
    @vite('resources/css/app.css')

    {{-- Inline style untuk set ukuran dan hotspot --}}
    <style>
        /* Pastikan gunakan versi cursor yang sudah di-resize ke 32x32 px */
        body {
            cursor: url("{{ asset('images/cursor.png') }}") 16 16, pointer;
            /* angka 16 16 = koordinat hotspot (tengah gambar 32x32) */
        }
    </style>
</head>

<body class="bg-[#14191A] text-white min-h-screen flex flex-col">

    @if(auth()->check() && auth()->user()->role === 'admin')
        <main>
            @yield('content')
        </main>
    @else
        @include('layouts.navbar')

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    @endif

</body>
</html>
