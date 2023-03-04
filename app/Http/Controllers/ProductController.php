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

        $city = City::find(Session::get('cityId'));

        $warehouses = [];
        $price = 0;
        $quantity = 0;

        $cities = $product->cities();
        if (count($cities->get()) > 0) {
            $price = $cities->wherePivot('city_id', '=', $city->id)->first()->pivot->price;
        }

        if (isset($city)) {
            $warehouses = $product->warehouses->where('city_id', '=', $city->id);
        }

        foreach ($warehouses as $warehouse) {
            $quantity += $warehouse->pivot->quantity;
        }

        return view('products.index', [
            'item' => $product,
            'price' => $price,
            'quantity' => $quantity,
            'category' => $category,
            'breadcrumbs' => $breadcrumbs,
            'city' => $city,
            'warehouses' => $warehouses
        ]);
    }
}
