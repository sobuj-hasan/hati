<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    use HasFactory;
    function rlsnwithproduct(){
        return $this->hasone(Product::class, 'id', 'product_id');
    }
    function rlsnwithorder(){
        return $this->hasone(Order::class, 'id', 'order_id');
    }
}
