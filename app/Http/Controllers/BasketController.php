<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Models\City;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function index()
    {
        $products = null;
        $quantities = null;
        $city = null;
        $total = 0;

        $sessionBasket = Session::get('basket');

        if (isset($sessionBasket)) {
            $city = City::find(Session::get('cityId'));
            $products = Product::find(array_keys($sessionBasket));
            $quantities = array_values($sessionBasket);

            for($i = 0; $i < count($products); $i++) {
                $total += $quantities[$i] * $products[$i]->cities()->wherePivot('city_id', '=', $city->id)->first()->pivot->price;
            }
        }

        return view('basket.index', [
            'city' => $city,
            'products' => $products,
            'quantities' => $quantities,
            'total' => $total
        ]);
    }

    public function add(BasketRequest $request, $productId)
    {
        $productData = $request->validated();
        $currentBasket = Session::get('basket');

        if (!isset($currentBasket)) {
            $currentBasket = array(
                $productId => (int)$productData['quantity']
            );
        } else {
            $currentBasket[$productId] = (int)$productData['quantity'];
        }

        Session::put('basket', $currentBasket);

        return redirect(route('basket'));
    }
}
