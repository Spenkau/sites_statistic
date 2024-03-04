<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body class="antialiased">
<nav class="d-flex nav">
    <a href="{{ route('login') }}">Вход</a>
    <a href="{{ route('register') }}">Регистрация</a>
</nav>
</body>
</html>
