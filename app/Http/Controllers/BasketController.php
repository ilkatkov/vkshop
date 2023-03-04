<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function index()
    {
        $products = null;
        $quantities = null;
        $sessionBasket = Session::get('basket');

        if (isset($sessionBasket)) {
            $products = Product::find(array_keys($sessionBasket));
            $quantities = array_values($sessionBasket);
        }

        return view('basket.index', [
            'products' => $products,
            'quantities' => $quantities
        ]);
    }

    public function add(BasketRequest $request)
    {
        $productData = $request->validated();
        $currentBasket = Session::get('basket');

        if (!isset($currentBasket)) {
            $currentBasket = array(
                $productData['productId'] => (int)$productData['quantity']
            );
        } else {
            if (isset($currentBasket[$productData['productId']])) {
                $currentBasket[$productData['productId']] += (int)$productData['quantity'];
            } else {
                $currentBasket[$productData['productId']] = (int)$productData['quantity'];
            }
        }

        Session::put('basket', $currentBasket);

        return redirect(route('basket'));
    }
}
