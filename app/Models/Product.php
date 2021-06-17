<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'full_description', 'price', 'new_price', 'alias', 'category_id', 'title'];
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany('App\Models\ImageProduct');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getNewPrice()
    {
        return isset($this->new_price) ? $this->new_price .'$' : '';
    }

    public function getTotalPriceProduct()
    {
        if (!is_null($this->pivot)) {
            return isset($this->new_price) ? $this->pivot->count * $this->new_price : $this->pivot->count * $this->price;
        }
    }

    public function isNew(): string
    {
        return $this->new ? 'New' : '';
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

}
