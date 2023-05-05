<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'alias', 'active'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activeProducts()
    {
        return $this->products()->where('active', true);
    }
}
