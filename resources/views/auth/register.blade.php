@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">

        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@vk.com" required="required" autofocus>
            <label for="floatingEmail">Электронная почта</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="login" value="{{ old('login') }}" placeholder="Логин" required="required">
            <label for="floatingLogin">Логин</label>
            @if ($errors->has('login'))
                <span class="text-danger text-left">{{ $errors->first('login') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя" required="required">
            <label for="floatingName">Имя</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="surname" value="{{ old('surname') }}" placeholder="Фамилия" required="required">
            <label for="floatingSurname">Фамилия</label>
            @if ($errors->has('surname'))
                <span class="text-danger text-left">{{ $errors->first('surname') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="patronymic" value="{{ old('patronymic') }}" placeholder="Отчество" required="required">
            <label for="floatingPatronymic">Отчество</label>
            @if ($errors->has('patronymic'))
                <span class="text-danger text-left">{{ $errors->first('patronymic') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Адрес" required="required">
            <label for="floatingPatronymic">Адрес</label>
            @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="71234567890" required="required">
            <label for="floatingPatronymic">Номер телефона</label>
            @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Пароль" required="required">
            <label for="floatingPassword">Пароль</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Подтверждение пароля" required="required">
            <label for="floatingConfirmPassword">Подтверждение пароля</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Готово!</button>

        @include('auth.partials.copy')
    </form>
@endsection
