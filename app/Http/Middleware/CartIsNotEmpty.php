<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order;

class CartIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!is_null(Order::getOrder())) {
            $order = Order::getOrder();
            if ($order->products->count() == 0) {
                session()->flash('error', 'Cart is Empty!');
                return redirect()->route('main');
            }
        } else {
            session()->flash('warning', 'Cart is Empty!');
            return redirect()->route('main');
        }
        return $next($request);
    }
}
