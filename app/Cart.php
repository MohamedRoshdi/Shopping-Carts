<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function items()
    {
        return $this->belongsToMany('App\Product', 'orders',
            'cart_id', 'product_id');
    }
}
