@extends('layouts.app')

@section('content')
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <h1>{{ __('Login') }}</h1>
        <form method="POST" action="/api/login" style="text-align: center; margin: auto;">
            @csrf
            @method('POST')
            <div>
                <input placeholder="Введите почту" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div>
                <input type="password" placeholder="Введите пароль" name="password" id="password"
                       value="{{ old('password') }}">
            </div>

            <div>
                <label for="remember_me">Запомнить меня</label>
                <input type="checkbox" name="remember_me" id="remember_me">
            </div>

            <button type="submit">Войти</button>
        </form>
    </div>

@endsection
