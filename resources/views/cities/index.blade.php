@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <h1>Выберите город</h1>

        <ul>
            @foreach($cities as $city)
                <li> <a href="{!! route('setCity', ['cityId'=>$city->id]) !!}">{{$city->title}}</a></li>
            @endforeach
        </ul>
    </div>
    @include('auth.partials.copy')
@endsection
