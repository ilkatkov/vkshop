@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <h1>{{auth()->user()->name}} {{auth()->user()->surname}}</h1>

        <form method="post" action="{{ route('account.edit') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="login" value="{{ auth()->user()->login }}" placeholder="Логин" required="required">
                <label for="floatingLogin">Логин</label>
                @if ($errors->has('login'))
                    <span class="text-danger text-left">{{ $errors->first('login') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="Имя" required="required">
                <label for="floatingName">Имя</label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="surname" value="{{ auth()->user()->surname }}" placeholder="Фамилия" required="required">
                <label for="floatingSurname">Фамилия</label>
                @if ($errors->has('surname'))
                    <span class="text-danger text-left">{{ $errors->first('surname') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="patronymic" value="{{ auth()->user()->patronymic }}" placeholder="Отчество" required="required">
                <label for="floatingPatronymic">Отчество</label>
                @if ($errors->has('patronymic'))
                    <span class="text-danger text-left">{{ $errors->first('patronymic') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}" placeholder="Адрес" required="required">
                <label for="floatingPatronymic">Адрес</label>
                @if ($errors->has('address'))
                    <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}" placeholder="71234567890" required="required">
                <label for="floatingPatronymic">Номер телефона</label>
                @if ($errors->has('phone'))
                    <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Сохранить</button>
        </form>
        <div>
            <h2>Ваши заказы</h2>
            <ul class="list-group list-group-flush">
                @foreach ($orders as $order)
                    <li class="list-group-item">Заказ №{{$order->id}} от {{$order->created_at}} - <span style="color:{{$order->status->color}};">{{$order->status->title}}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
    @include('auth.partials.copy')
@endsection
