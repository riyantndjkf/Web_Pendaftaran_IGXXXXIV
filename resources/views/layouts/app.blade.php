<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Industrial Games') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#14191A] text-white min-h-screen flex flex-col">

    @include('layouts.navbar')

    <main >
        @yield('content')
    </main>

    @include('layouts.footer')

</body>

</html>
