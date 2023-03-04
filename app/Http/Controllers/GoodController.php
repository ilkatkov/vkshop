<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function index($itemLink)
    {
        $item = new Good();
        $item = $item->firstWhere('link', '=', $itemLink);
        $category = $item->category;
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

        return view('goods.index', ['item' => $item, 'category' => $category, 'breadcrumbs' => $breadcrumbs]);

    }
}
