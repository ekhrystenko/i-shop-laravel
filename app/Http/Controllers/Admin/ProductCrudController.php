<?php

namespace App\Http\Controllers\Admin;

use App\DTO\ProductDTO;
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

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 */
class ProductCrudController extends AbstractAdminController
{
    /**
     * @return Application|mixed
     */
    public function getClassName()
    {
        return app(Product::class);
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return 'product';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminProductRequest $request
     * @return RedirectResponse
     */
    public function store(AdminProductRequest $request)
    {
        $data = new ProductDTO($request->all());

        $product = $this->getClassName();
        $product->title = $data->title;
        $product->description = $data->description;
        $product->full_description = $data->full_description;
        $product->price = $data->price;
        $product->new_price = $data->new_price;
        $product->alias = $data->alias;
        $product->category_id = $data->category_id;
        $product->active = $data->active;
        $product->new = $data->new;

        $product->save();

        if($request->images) {
            foreach ($request->images as $image) {
                $path = $image->store('product');
                ImageProduct::create([
                    'product_id' => $product->id,
                    'img' => $path,
                ]);
            }
        }

        return redirect()->route('product.index')->with(['success' => 'Product added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param $product_alias
     * @return Application|Factory|View|Response
     */
    public function show($product_alias)
    {
        $product = $this->getClassName()->where('alias', $product_alias)->first();
        return $this->getShowView($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $product_alias
     * @return Application|Factory|View|Response
     */
    public function edit($product_alias)
    {
        $product = $this->getClassName()->where('alias', $product_alias)->first();
        return $this->getEditView($product);
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
        $product = $this->getClassName()->where('alias', $product_alias)->first();

        $data = new ProductDTO($request->all());

        $product->title = $data->title;
        $product->description = $data->description;
        $product->full_description = $data->full_description;
        $product->price = $data->price;
        $product->new_price = $data->new_price;
        $product->alias = $data->alias;
        $product->category_id = $data->category_id;
        $product->active = $data->active;
        $product->new = $data->new;

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

        return redirect()->route('product.index')->with(['success__updated' => 'Product updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $product_alias
     * @return RedirectResponse
     */
    public function destroy($product_alias)
    {
        $product = $this->getClassName()->where('alias', $product_alias)->first();
        $product->images()->delete();
        $product->delete();

        return redirect()->route('product.index')->with(['success__deleted' => 'Product deleted!']);
    }

    public function imageDestroy($image_id)
    {
        $image = ImageProduct::where('id', $image_id)->first();
        $image->delete();

        return redirect()->route('product.index')->with(['success__deleted' => 'Image deleted!']);
    }
}





