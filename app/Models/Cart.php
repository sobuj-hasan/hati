<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    function rlsntoproduct(){
        return $this->hasone(Product::class, 'id', 'product_id');
    }


}
