@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <h1>VK Интернет-магазин</h1>
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

        <h3>Каталог</h3>

        <div role="tabpanel">
            <div class="list-group" id="myList" role="tablist">
                @foreach($categories as $first)
                    <button class="list-group-item list-group-item-action" data-bs-toggle="list" href="#{{$first->link}}" role="tab"><img src="{{$first->image}}" class="categoryLogoMenu" alt="{{$first->title}}"><a style="text-decoration: none;color:inherit;" href="/katalog/{{$first->link}}">{{$first->title}}</a></button>
                @endforeach
            </div>
            <div class="tab-content">
                @foreach($categories as $first)
                    <div style="margin-top: 32px;" class="tab-pane" id="{{$first->link}}" role="tabpanel">
                        <div role="tabpanel">
                            <div class="list-group" id="myList" role="tablist">
                                @foreach($first->childrenRecursive as $second)
                                    <button class="list-group-item list-group-item-action" data-bs-toggle="list" href="#{{$second->link}}" role="tab"><img src="{{$second->image}}" class="categoryLogoMenu" alt="{{$second->title}}"><a style="text-decoration: none;color:inherit;" href="/katalog/{{$second->link}}">{{$second->title}}</a></button>
                                @endforeach
                            </div>
                            <div class="tab-content">
                                @foreach($first->childrenRecursive as $second)
                                    <div style="margin-top: 32px;" class="tab-pane" id="{{$second->link}}" role="tabpanel">
                                        <div role="tabpanel">
                                            <div class="list-group" id="myList" role="tablist">
                                                @foreach($second->childrenRecursive as $third)
                                                    <a class="list-group-item list-group-item-action" href="/katalog/{{$third->link}}"><img src="{{$third->image}}" class="categoryLogoMenu" alt="{{$third->title}}">{{$third->title}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <h3>Новинки</h3>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($lastGoods as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="/{{$item->image}}" class="card-img-top" alt="{{$item->title}}">
                        <div class="card-body">
                            <a class="card-title" href="/tovari/{{$item->link}}">{{$item->title}}</a>
                            <p class="card-text">{{$item->purchased}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('auth.partials.copy')
@endsection

