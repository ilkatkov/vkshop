<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productLink)
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

        return view('products.index', ['item' => $product, 'category' => $category, 'breadcrumbs' => $breadcrumbs]);

    }
}
