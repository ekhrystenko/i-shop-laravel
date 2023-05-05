<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CategoryDTO;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 */
class CategoryCrudController extends AbstractAdminController
{
    /**
     * @return Application|mixed
     */
    public function getClassName()
    {
        return app(Category::class);
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return 'category';
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $data = new CategoryDTO($request->all());

        $category = $this->getClassName();
        $category->title = $data->title;
        $category->alias = $data->alias;
        $category->active = $data->active;

        $category->save();

        return redirect()->route('category.index')->with(['success' => 'Category added!']);
    }

    /**
     * @param $alias
     * @return Application|Factory|View
     */
    public function show($alias)
    {
        $category = $this->getClassName()->where('alias', $alias)->first();
        return $this->getShowView($category);
    }

    /**
     * @param $alias
     * @return Application|Factory|View
     */
    public function edit($alias)
    {
        $category = $this->getClassName()->where('alias', $alias)->first();
        return $this->getEditView($category);
    }

    /**
     * @param CategoryRequest $request
     * @param $alias
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, $alias)
    {
        $product = $this->getClassName()->where('alias', $alias)->first();

        $data = new CategoryDTO($request->all());

        $product->title = $data->title;
        $product->alias = $data->alias;
        $product->active = $data->active;

        $product->update();

        return redirect()->route('category.index')->with(['success__updated' => 'Category updated!']);
    }
}





