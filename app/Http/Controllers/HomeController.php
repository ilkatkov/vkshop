<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private array $categoriesTree = [];

    public function index()
    {
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();
        $lastProducts = Product::latest()->take(5)->get();
        $cities = City::get();
        return view('home.index', ['categories' => $categories, 'lastProducts' => $lastProducts, 'cities' => $cities]);
    }
}
