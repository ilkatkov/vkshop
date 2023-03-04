@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Товары</a></li>
                @foreach($breadcrumbs as $breadcrumb)
                    <li class="breadcrumb-item"><a href="/katalog/{{$breadcrumb['link']}}">{{$breadcrumb['title']}}</a></li>
                @endforeach
                <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
            </ol>
        </nav>

        <h1>{{$category->title}}</h1>

        <div class="btn-group" role="group" aria-label="children categories">
            @foreach($childrenCategories as $childCategory)
                <a type="button" class="btn btn-outline-primary" href="/katalog/{{$childCategory->link}}">{{$childCategory->title}}</a>
            @endforeach
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($goods as $item)
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

        <div>
            <h6>{{$category->description}}</h6>
        </div>
    </div>
    @include('auth.partials.copy')
@endsection
