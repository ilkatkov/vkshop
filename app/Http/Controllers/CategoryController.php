<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($firstLevel, $secondLevel = null, $thirdLevel = null) {
        $category = new Category();
        $breadcrumbs = array();

        $firstCheck = $category->firstWhere('link', '=', $firstLevel);
        if (isset($firstCheck)) {
            $categoryView = $firstCheck;
            $childrenCategories = $firstCheck->children;
        } else {
            abort(404);
        }

        if (isset($secondLevel)) {
            $secondCheck = $category->firstWhere('link', '=', $secondLevel);
            if ($secondCheck->parent->link == $firstLevel) {
                $breadcrumbs[] = [
                    'title' => $firstCheck->title,
                    'link' => $firstCheck->link
                ];
                $categoryView = $secondCheck;
                $childrenCategories = $secondCheck->children;
            } else {
                abort(404);
            }
        }

        if (isset($thirdLevel)) {
            $thirdCheck = $category->firstWhere('link', '=', $thirdLevel);
            if ($thirdCheck->parent->link == $secondLevel) {
                $breadcrumbs[] = [
                    'title' => $secondCheck->title,
                    'link' => $secondCheck->link
                ];
                $categoryView = $thirdCheck;
                $childrenCategories = $thirdCheck->children;
            } else {
                abort(404);
            }
        }

        $goods = $categoryView->goods;
        return view('categories.index', ['category' => $categoryView, 'childrenCategories' => $childrenCategories, 'breadcrumbs' => $breadcrumbs, 'goods' => $goods]);
    }
}
