@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <h1>Корзина</h1>

        @if (!isset($products))
            <p>Корзина пуста</p>
        @else
            <form class="row d-flex justify-content-center my-4" method="get" action="{{route('order.add')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="total" value="{{ $total }}" />
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            @for($i = 0; $i < count($products); $i++)
                            <div class="row">
                                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                        <img src="{{$products[$i]->image}}"
                                             class="w-100" alt="{{$products[$i]->title}}" />
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                    <p><a href="{{route('product.show', [$products[$i]->link])}}"><strong>{{$products[$i]->title}}</strong></a></p>
                                    <button type="button" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                            title="Remove item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <div class="col-lg-4 col-md-2 mb-4 mb-lg-0">
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                        <p class="text-start text-md-center">
                                            <strong>{{$quantities[$i]}} * {{$products[$i]->cities()->wherePivot('city_id', '=', $city->id)->first()->pivot->price}} = {{$quantities[$i] * $products[$i]->cities()->wherePivot('city_id', '=', $city->id)->first()->pivot->price}}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            @endfor
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Итого</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <span>Самовывоз</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Общая стоимость</strong>
                                        </div>
                                        <span><strong>{{$total}}</strong></span>
                                    </li>
                                </ul>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Подтвердить заказ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif
        </div>
    @include('auth.partials.copy')
@endsection
