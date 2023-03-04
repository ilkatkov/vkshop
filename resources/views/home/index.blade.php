@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
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
        <div role="tabpanel">
            <div class="list-group" id="myList" role="tablist">
                @foreach($categories as $first)
                    <button class="list-group-item list-group-item-action" data-bs-toggle="list" href="#{{$first->link}}" role="tab"><a style="text-decoration: none;color:black;" href="/tovari/{{$first->link}}">{{$first->title}}</a></button>
                @endforeach
            </div>
            <div class="tab-content">
                @foreach($categories as $first)
                    <div style="margin-top: 32px;" class="tab-pane" id="{{$first->link}}" role="tabpanel">
                        <div role="tabpanel">
                            <div class="list-group" id="myList" role="tablist">
                                @foreach($first->childrenRecursive as $second)
                                    <button class="list-group-item list-group-item-action" data-bs-toggle="list" href="#{{$second->link}}" role="tab"><a style="text-decoration: none;color:black;" href="/tovari/{{$first->link . '/' . $second->link}}">{{$second->title}}</a></button>
                                @endforeach
                            </div>
                            <div class="tab-content">
                                @foreach($first->childrenRecursive as $second)
                                    <div style="margin-top: 32px;" class="tab-pane" id="{{$second->link}}" role="tabpanel">
                                        <div role="tabpanel">
                                            <div class="list-group" id="myList" role="tablist">
                                                @foreach($second->childrenRecursive as $third)
                                                    <a class="list-group-item list-group-item-action" href="/tovari/{{$first->link . '/' . $second->link . "/" . $third->link}}">{{$third->title}}</a>
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
    </div>
@endsection
