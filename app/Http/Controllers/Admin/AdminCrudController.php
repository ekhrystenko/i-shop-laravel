<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('auth.admin.adminMain', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('auth.admin.adminAddProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminProductRequest $request
     * @return RedirectResponse
     */
    public function store(AdminProductRequest $request)
    {

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->full_description = $request->full_description;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->alias = $request->alias;
        $product->category_id = $request->categories;
        if($request->new){
            $product->new = 1;
        } else {
            $product->new = 0;
        }
        $product->save();

        foreach ($request->images as $image) {
            $path = $image->store('product');
            ImageProduct::create([
                'product_id' => $product->id,
                'img' => $path,
            ]);

        }

        return redirect()->route('admin.index')->with(['success' => 'Product added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param $product_alias
     * @return Application|Factory|View|Response
     */
    public function show($product_alias)
    {
        $product = Product::where('alias', $product_alias)->first();
        return view('auth.admin.adminShowProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $product_alias
     * @return Application|Factory|View|Response
     */
    public function edit($product_alias)
    {
        $product = Product::where('alias', $product_alias)->first();
        return view('auth.admin.adminUpdateProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminProductRequest $request
     * @param $product_alias
     * @return RedirectResponse
     */
    public function update(AdminProductRequest $request, $product_alias)
    {
        $product = Product::where('alias', $product_alias)->first();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->full_description = $request->full_description;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->alias = $request->alias;
        if($request->new){
            $product->new = 1;
        } else {
            $product->new = 0;
        }
        $product->update();

        if (!empty($request->images)) {
            foreach ($request->images as $image) {
                $path = $image->store('product');
                ImageProduct::create([
                    'product_id' => $product->id,
                    'img' => $path,
                ]);
            }
        }

        return redirect()->route('admin.index')->with(['success__updated' => 'Product updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $product_alias
     * @return RedirectResponse
     */
    public function destroy($product_alias)
    {
        $product = Product::where('alias', $product_alias)->first();
        $product->images()->delete();
        $product->delete();

        return redirect()->route('admin.index')->with(['success__deleted' => 'Product deleted!']);
    }

    public function imageDestroy($image_id)
    {
        $image = ImageProduct::where('id', $image_id)->first();
        $image->delete();

        return redirect()->route('admin.index')->with(['success__deleted' => 'Image deleted!']);
    }

}





