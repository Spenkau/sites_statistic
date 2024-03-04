@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('Register') }}</h1>
        <form method="POST" action="/api/register" style="text-align: center; margin: auto;">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div>
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <label for="c_password">Повторите пароль</label>
                <input type="password" name="c_password" id="c_password">
            </div>

            <div>
                <label for="remember_me">Запомнить меня</label>
                <input type="checkbox" name="remember_me" id="remember_me">
            </div>

            <button type="submit">Регистрация</button>
        </form>
    </div>
@endsection
