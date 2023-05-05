<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class AbstractAdminController
 * @package App\Http\Controllers\Admin
 */
abstract class AbstractAdminController extends Controller
{
    /**
     * @return mixed
     */
    abstract public function getClassName();

    /**
     * @return string
     */
    abstract public function getModelName(): string;

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function activate($id)
    {
        $model = $this->findById($id);
        $model->active = 1;
        $model->save();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->getClassName()->where('id', $id)->first();
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deactivate($id)
    {
        $model = $this->findById($id);
        $model->active = 0;
        $model->save();

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $models = $this->getClassName()->paginate(5);
        return view('auth.admin.' . $this->getModelName() . '.index', compact('models'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('auth.admin.' . $this->getModelName() . '.add');
    }

    /**
     * @param $model
     * @return Application|Factory|View
     */
    public function getEditView($model)
    {
        return view('auth.admin.' . $this->getModelName() . '.edit', compact('model'));
    }

    /**
     * @param $model
     * @return Application|Factory|View
     */
    public function getShowView($model)
    {
        return view('auth.admin.' . $this->getModelName() . '.show', compact('model'));
    }

    /**
     * @param $alias
     * @return RedirectResponse
     */
    public function destroy($alias)
    {
        $category = $this->getClassName()->where('alias', $alias)->first();
        $category->delete();

        return redirect()->route($this->getModelName() . '.index')->with(['success__deleted' => $category->title . ' deleted!']);
    }
}
