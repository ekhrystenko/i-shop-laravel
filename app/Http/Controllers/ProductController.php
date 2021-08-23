<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function execute($category_alias, $product_alias)
    {
        $product = Product::where('alias', $product_alias)->first();
        $comments = Comment::where('product_id', $product->id)->paginate(5);

        return view('product', compact('product', 'comments'));
    }

    public function allProducts(FilterRequest $request)
    {
        $productsQuery = Product::query();
        if ($request->filled('price_from'))
            $productsQuery->where('price', '>=', $request->price_from);

        if ($request->filled('price_to'))
            $productsQuery->where('price', '<=', $request->price_to);

        if ($request->has('new'))
            $productsQuery->new();

        if ($request->filled('search'))
            $productsQuery->where('title', 'LIKE', "%{$request->search}%");

        $products = $productsQuery->orderBy('new', 'DESC')->paginate(4)->
                    withPath("?" . $request->getQueryString());

        return view('all-products', compact('products'));
    }

    public function saveComment($product, Request $request)
    {
        $product_id = Product::where('id', $product)->first()->id;
        $user_id = Auth::user()->id;

        Comment::create([
            'description' => $request->comment,
            'product_id' => $product_id,
            'user_id' => $user_id,
        ]);

        return redirect()->back()->with(['success' => 'Comment added!']);
    }
}
