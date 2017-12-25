<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Product extends Model
{
    protected $table = 'products';

//    public function carts()
//    {
//        return $this->belongsToMany('App\Cart', 'orders',
//            'product_id', 'product_id');
//    }
}
