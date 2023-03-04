<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($categoryLink) {
        $category = new Category();
        $breadcrumbs = array();

        $category = $category->firstWhere('link', '=', $categoryLink);
        if (isset($category)) {
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
            $childrenCategories = $category->children;
        } else {
            abort(404);
        }

        $products = $category->products;
        return view('categories.index', ['category' => $category, 'childrenCategories' => $childrenCategories, 'breadcrumbs' => $breadcrumbs, 'products' => $products]);
    }
}
