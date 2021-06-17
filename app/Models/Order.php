<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('count')->withTimestamps();
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getTotalPriceProduct();
        }
        return $total;
    }

    public static function getOrder()
    {
        $orderId = session('orderId');
        return !is_null($orderId) ? Order::find($orderId) : null;
    }

    public function saveOrder($name, $email, $phone)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}

