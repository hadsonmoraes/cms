<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'CMS') }}</title>

    @vite(['sistema/resources/css/admin.css', 'sistema/resources/js/admin.js'])
</head>

<body class="login-page bg-body-secondary">

    @yield('content')

</body>

</html>
