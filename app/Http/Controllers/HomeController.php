<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private array $categoriesTree = [];

    public function index()
    {
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();
        return view('home.index', ['categories' => $categories]);
    }
}
