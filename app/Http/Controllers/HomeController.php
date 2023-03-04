<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private array $categoriesTree = [];

    public function index()
    {
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();
        $lastGoods = Good::latest()->take(5)->get();
        return view('home.index', ['categories' => $categories, 'lastGoods' => $lastGoods]);
    }
}
