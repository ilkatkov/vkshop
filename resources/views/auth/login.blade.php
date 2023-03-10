@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="logo nav-link  text-secondary"><img id="vkLogo" src="{!! url('images/logo-blue.svg') !!}" alt="logo"><p>Интернет-магазин</p></a></li>
        </ul>

        <h1 class="h3 mb-3 fw-normal">Вход</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="login" value="{{ old('login') }}" placeholder="Логин" required="required" autofocus>
            <label for="floatingLogin">Логин или email</label>
            @if ($errors->has('login'))
                <span class="text-danger text-left">{{ $errors->first('login') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Пароль" required="required">
            <label for="floatingPassword">Пароль</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Вход</button>

        @include('auth.partials.copy')
    </form>
@endsection
