@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        @include('layouts.partials.breadcrumbs')

        <form method="POST" action="{{ route('basket.add', [$item->id]) }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" id = "quantity-max" value ='{{$quantity}}'>
            <input type="hidden" name = "productId" value ='{{$item->id}}'>

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
                        <div class="d-flex mb-4" style="max-width: 300px">
                            <button type="button" class="btn btn-primary px-3 me-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                <i class="fas fa-minus"></i>
                            </button>

                            <div class="form-outline">
                                <input id="form1" min="1" name="quantity" max="{{$quantity}}" value="{{$cartQuantity}}" type="number" class="form-control" />
                                <label class="form-label" for="form1">Количество</label>
                            </div>

                            <button type="button" class="btn btn-primary px-3 ms-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <p>Наличие в магазинах</p>

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
                @elseif (!isset($city))
                    <p>Для добавления товара в корзину необходимо <a href="{!! route('cities') !!}">выбрать город</a></p>
                @else
                    <h6>Товара нет в наличии</h6>
                @endif
            </div>
    </form>

    @include('auth.partials.copy')

{{--    <script>--}}
{{--        let maxQuantity = parseInt(document.getElementById('quantity-max').value);--}}
{{--        let quantity = document.getElementById('quantity');--}}
{{--        let quantityPlus = document.getElementById('quantity-plus');--}}
{{--        let quantityMinus = document.getElementById('quantity-minus');--}}
{{--        try {--}}
{{--            quantityPlus.onclick = function() {--}}
{{--                if (quantity.value < maxQuantity) {--}}
{{--                    quantity.value = parseInt(quantity.value) + 1;--}}
{{--                }--}}
{{--            }--}}
{{--            quantityMinus.onclick = function() {--}}
{{--                if (quantity.value > 1) {--}}
{{--                    quantity.value = parseInt(quantity.value) - 1;--}}
{{--                }--}}
{{--            }--}}
{{--        } catch (e) {--}}

{{--        }--}}
{{--    </script>--}}
@endsection
