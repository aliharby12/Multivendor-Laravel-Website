<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // relate the order with the items
    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id');
    }
}
