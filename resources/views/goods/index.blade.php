@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        @include('layouts.partials.breadcrumbs')

        <h1>{{$item->title}}</h1>

        <div>
            <h6>{{$item->description}}</h6>
        </div>

    </div>
    @include('auth.partials.copy')
@endsection
