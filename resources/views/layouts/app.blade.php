<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased">
    <header>
        <ul class="d-flex list-unstyled">
            <li><a href="{{ route('login') }}">Вход</a></li>
            <li><a href="{{ route('register') }}">Регистрация</a></li>
        </ul>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <ul class="list-unstyled">
            <li>О нас</li>
            <li>О нас</li>
            <li>О нас</li>
            <li>О нас</li>
        </ul>
    </footer>
</body>
</html>
