<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function execute(Request $request, $category_alias)
    {
        $current_category = Category::where('alias', $category_alias)->first();
        $products = Product::where('category_id', $current_category->id)->paginate(4);

        return view('category', compact('current_category','products'));
    }

}
