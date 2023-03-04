@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <h1>{{$city->title}}</h1>
        <h4>Склады</h4>
        <div class="row">
            @foreach($warehouses as $item)
                @include('warehouses.item', ['item' => $item])
            @endforeach
        </div>
    </div>
    @include('auth.partials.copy')
@endsection
