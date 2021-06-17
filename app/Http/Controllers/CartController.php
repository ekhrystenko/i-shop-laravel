<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Http\Requests\CheckOrderRequest;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function execute()
    {
        $order = Order::getOrder();
        return view('cart', compact('order'));
    }


    public function checkOrder()
    {
        $order = Order::getOrder();
        return view('check-order', compact('order'));
    }

    public function confirm(CheckOrderRequest $request)
    {
        $order = Order::getOrder();

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $order->saveOrder($name, $email, $phone);
        $site = 'G6-Store';
        $link = "http://g6-store/";
        $token = 'bot1563575064:AAFHXmuufEQhvFYMCDXZYVgV07Nt0DuW0AU';
        $chat_id = '-541357186';


        $txt = "У Вас новый заказ на сайте: " . $site . "\n"
            . "Имя: " . $name . "\n"
            . "E-Mail: " . $email . "\n"
            . "Телефон: " . $phone . "\n"
            . "Сайт: " . $link;

        fopen('https://api.telegram.org/'.$token.'/sendMessage?chat_id='.$chat_id.'&parse_mode=html&text='.rawurlencode($txt), 'r');
        return redirect()->route('main')->with(['success' => 'Thank you, your order has been processed!']);

    }

    public function addToCart (int $product_id)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);

        }

        if ($order->products->contains($product_id)){
            $tableRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $tableRow->count++;
            $tableRow->update();
        } else {
            $order->products()->attach($product_id);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        return redirect()->route('cart');
    }

    public function removeFromCart(int $product_id)
    {
        $order = Order::getOrder();

        if ($order->products->contains($product_id)){
            $tableRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            if ($tableRow->count < 2) {
                $order->products()->detach($product_id);
            } else {
                $tableRow->count--;
                $tableRow->update();
            }
        }
        return redirect()->route('cart');
    }
}
