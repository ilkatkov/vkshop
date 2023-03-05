@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <h1>Магазин амбассадоров VK</h1>
        @auth
            @if(auth()->user()->is_admin)
                <p class="lead">Привет, {{auth()->user()->name}}! (администратор)</p>
            @else
                <p class="lead">Привет, {{auth()->user()->name}}!</p>
            @endif
        @endauth

        @guest
            <p class="lead">Авторизуйтесь для совершения покупок</p>
        @endguest

        @include('layouts.partials.city', ['cities' => $cities])

        <h3>Каталог</h3>
        @include('layouts.partials.tree-categories', ['categories' => $categories])

        <h3>Новинки</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($lastProducts as $item)
                @include('products.item', ['item' => $item])
            @endforeach
        </div>
    </div>
    @include('auth.partials.copy')
@endsection

