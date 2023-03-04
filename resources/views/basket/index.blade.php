@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded d-grid gap-3">
        <h1>Корзина</h1>

        @if (!isset($products))
            <p>Корзина пуста</p>
        @else
            <div class="row d-flex justify-content-center my-4">
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
                                    <p><strong>{{$products[$i]->title}}</strong></p>
                                    <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                            title="Remove item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                                            title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>

                                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                        <button class="btn btn-primary px-3 me-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <div class="form-outline">
                                            <input id="form1" min="0" name="quantity" value="{{$quantities[$i]}}" type="number" class="form-control" />
                                            <label class="form-label" for="form1">Количество</label>
                                        </div>

                                        <button class="btn btn-primary px-3 ms-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <p class="text-start text-md-center">
                                        <strong>Цена</strong>
                                    </p>
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
                                        <span><strong>13700</strong></span>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                    Подтвердить заказ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    @include('auth.partials.copy')
@endsection
