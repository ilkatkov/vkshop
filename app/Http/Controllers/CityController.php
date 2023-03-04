<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return view('cities.index', ['cities' => $cities]);
    }

    public function setup($cityId)
    {
        Session::put('basket', null);
        $city = City::find($cityId);
        if (isset($city)){
            Session::put('city', $city->title);
            Session::put('cityId', $city->id);
        }
        return redirect()->intended();
    }

    public function show($cityId)
    {
        $city = City::find($cityId);
        if (isset($city)) {
            $warehouses = $city->warehouses;
            return view('cities.show', ['city' => $city, 'warehouses' => $warehouses]);
        }
    }
}
