@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>VK Интернет-магазин</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Товары</a></li>
                @if (isset($breadcrumbs[0]))
                    <li class="breadcrumb-item"><a href="/tovari/{{$breadcrumbs[0]['link']}}">{{$breadcrumbs[0]['title']}}</a></li>
                @endif
                @if (isset($breadcrumbs[1]))
                    <li class="breadcrumb-item"><a href="/tovari/{{$breadcrumbs[1]['link']}}">{{$breadcrumbs[1]['title']}}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
            </ol>
        </nav>

        <h2>{{$category->title}}</h2>

        <div class="btn-group" role="group" aria-label="children categories">
            @foreach($childrenCategories as $childCategory)
                <a type="button" class="btn btn-outline-primary" href="/tovari/{{($category->parent) ? $category->parent->link . '/' : ''}}{{$category->link}}/{{$childCategory->link}}">{{$childCategory->title}}</a>
            @endforeach
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($goods as $item)
            <div class="col">
                <div class="card h-100">
                    <img src="{{$item->image}}" class="card-img-top" alt="{{$item->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->purchased}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div>
            <h6>{{$category->description}}</h6>
        </div>
    </div>
@endsection
