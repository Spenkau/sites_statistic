@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ __('Login') }}</h1>
        <form method="POST" action="/api/login" style="text-align: center; margin: auto;">
            @csrf
            @method('POST')
            <div>
                <label for="email">Email</label>
                <input class="is-invalid" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div>

                <label for="password">Пароль</label>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <label for="remember_me">Запомнить меня</label>
                <input type="checkbox" name="remember_me" id="remember_me">
            </div>

            <button type="submit">Вход</button>
        </form>
    </div>

@endsection
