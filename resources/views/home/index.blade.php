@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            @if(auth()->user()->is_admin)
                <h1>VK Интернет-магазин</h1>
                <p class="lead">Вы admin</p>
            @else
                <h1>VK Интернет-магазин</h1>
                <p class="lead">Вы авторизованы</p>
            @endif
        @endauth

        @guest
            <h1>VK Интернет-магазин</h1>
            <p class="lead">Авторизуйтесь для совершения покупок</p>
        @endguest
    </div>
@endsection
