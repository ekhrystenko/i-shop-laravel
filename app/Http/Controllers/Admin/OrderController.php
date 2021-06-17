<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function execute()
    {
        $orders = Order::active()->paginate(4);
        return view('auth.admin.adminOrders', compact('orders'));
    }
}
