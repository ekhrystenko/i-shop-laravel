<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Foundation\Application;
use App\Models\Order;

class OrderController extends AbstractAdminController
{
    /**
     * @return Application|mixed
     */
    public function getClassName()
    {
        return app(Order::class);
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return 'order';
    }
}
