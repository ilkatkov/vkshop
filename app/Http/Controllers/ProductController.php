<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show($productLink)
    {
        $product = new Product();
        $product = $product->firstWhere('link', '=', $productLink);
        $category = $product->category;
        $breadcrumbs = array();

        if (isset($category->parent->parent)) {
            $breadcrumbs[] = [
                'title' => $category->parent->parent->title,
                'link' => $category->parent->parent->link
            ];
        }
        if (isset($category->parent)) {
            $breadcrumbs[] = [
                'title' => $category->parent->title,
                'link' => $category->parent->link
            ];
        }

        $warehouses = [];
        $price = 0;
        $quantity = 0;
        $cartQuantity = 1;

        $city = City::find(Session::get('cityId'));

        if (isset($city)) {
            $cities = $product->cities();

            if (count($cities->get()) > 0) {
                $priceInCity = $cities->wherePivot('city_id', '=', $city->id)->first();

                if (isset($priceInCity)) {
                    $price = $priceInCity->pivot->price;
                };
            }

            $warehouses = $product->warehouses->where('city_id', '=', $city->id);

            foreach ($warehouses as $warehouse) {
                $quantity += $warehouse->pivot->quantity;
            }

            $basket = Session::get('basket');
            if ($basket !== null) {
                if (isset($basket[$product->id])){
                    $cartQuantity = $basket[$product->id];
                }
            }

        }

        return view('products.index', [
            'item' => $product,
            'price' => $price,
            'quantity' => $quantity,
            'cartQuantity' => $cartQuantity,
            'category' => $category,
            'breadcrumbs' => $breadcrumbs,
            'city' => $city,
            'warehouses' => $warehouses
        ]);
    }
}
