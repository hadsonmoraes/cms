<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Meu CMS'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|space-grotesk:500,600,700&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    @vite(['site/resources/css/app.css', 'site/resources/js/app.js'])
</head>

<body>
    @include('site::partials.header')

    @yield('content')

    @include('site::partials.footer')

</body>

</html>
