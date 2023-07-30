@extends('layouts.app')

@section('content')
    <section class="login">
        <header class="login__header">
            <h2 class="login__title">Авторизация</h2>
        </header>
        <div class="login__wrapper">
            <form class="login__form" action="{{ route('login') }}" method="POST">
                @csrf
                <label class="login__label" for="email">
                    E-mail
                    <input class="login__input @error('email') is-invalid @enderror form-control" type="email"
                        placeholder="example@domain.xyz" name="email" required id="email" autofocus
                        value="{{ old('email') }}" autocomplete="email">
                </label>
                <label class="login__label" for="password">
                    Пароль
                    <input class="login__input @error('password') is-invalid @enderror form-control" type="password"
                        placeholder="" name="password" required id="password" autocomplete="current-password">
                </label>
                <div class="text-center">
                    <input value="Авторизоваться" type="submit" class="login__button">
                </div>
            </form>
        </div>
    </section>
@endsection
