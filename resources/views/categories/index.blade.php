@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">

        @include('layouts.partials.breadcrumbs')

        <h1>{{$category->title}}</h1>

        <div class="btn-group" role="group" aria-label="children categories">
            @foreach($childrenCategories as $childCategory)
                <a type="button" class="btn btn-outline-primary" href="/katalog/{{$childCategory->link}}">{{$childCategory->title}}</a>
            @endforeach
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($goods as $item)
                @include('goods.item', ['item' => $item])
            @endforeach
        </div>

        <div>
            <h6>{{$category->description}}</h6>
        </div>
    </div>
    @include('auth.partials.copy')
@endsection
