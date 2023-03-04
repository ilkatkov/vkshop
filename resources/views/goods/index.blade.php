@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Товары</a></li>
                @foreach($breadcrumbs as $breadcrumb)
                    <li class="breadcrumb-item"><a href="/katalog/{{$breadcrumb['link']}}">{{$breadcrumb['title']}}</a></li>
                @endforeach
                <li class="breadcrumb-item"><a href="/katalog/{{$category->link}}">{{$category->title}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$item->title}}</li>
            </ol>
        </nav>

        <h1>{{$item->title}}</h1>

        <div>
            <h6>{{$item->description}}</h6>
        </div>

    </div>
    @include('auth.partials.copy')
@endsection
