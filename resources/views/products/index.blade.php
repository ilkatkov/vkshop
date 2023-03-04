@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        @include('layouts.partials.breadcrumbs')

        <form method="post" action="{{ route('register.perform') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" id = "quantity-max" value ='{{$quantity}}'>

            <h1>{{$item->title}}</h1>

            <img src="{{$item->image}}" alt="{{$item->title}}">

            <div>
                <h6>{{$item->description}}</h6>
            </div>

            @guest
                <p class="lead">Авторизуйтесь для совершения покупок</p>
            @endguest

            <div>
                @if ($quantity > 0 && $price > 0)
                    <h6>Стоимость: <u>{{$price}}</u></h6>
                    <h6>На складе: <span>{{$quantity}}</span>  шт.</h6>

                    @auth
                        <div class="input-group mb-3">
                            <span class="input-group-text">Количество</span>
                            <input type="number" id="quantity" name = "quantity" min="1" max="{{$quantity}}" value="1" class="form-control" aria-label="Sizing example input" aria-describedby="quantity">
                        </div>

                        <div class="d-grid gap-2 d-md-block">
                            <input class="btn btn-primary" type="button" value="-" id="quantity-minus">
                            <input class="btn btn-primary" type="button" value="+" id="quantity-plus">
                        </div>

                        <p>В наличии:</p>

                        <div role="tabpanel">
                            <div class="list-group" id="myList" role="tablist">
                                @foreach($warehouses as $warehouse)
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#warehouse-{{$warehouse->id}}" role="tab">{{$warehouse->title}}</a>
                                @endforeach
                            </div>

                            <div class="tab-content">
                                @foreach($warehouses as $warehouse)
                                    <div class="tab-pane fade" id="warehouse-{{$warehouse->id}}" role="tabpanel">{{$city->title}}, {{$warehouse->address}}<br>Осталось: {{$warehouse->pivot->quantity}} шт.</div>
                                @endforeach
                            </div>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить в корзину</button>
                    @endauth
                @else
                    <h6>Товара нет в наличии</h6>
                @endif
            </div>
    </form>

    @include('auth.partials.copy')

    <script>
        let maxQuantity = parseInt(document.getElementById('quantity-max').value);
        let quantity = document.getElementById('quantity');
        let quantityPlus = document.getElementById('quantity-plus');
        let quantityMinus = document.getElementById('quantity-minus');
        try {
            quantityPlus.onclick = function() {
                if (quantity.value < maxQuantity) {
                    quantity.value = parseInt(quantity.value) + 1;
                }
            }
            quantityMinus.onclick = function() {
                if (quantity.value > 1) {
                    quantity.value = parseInt(quantity.value) - 1;
                }
            }
        } catch (e) {

        }
    </script>
@endsection
