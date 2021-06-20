<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;


class CartController extends Controller
{
    function addtocart(Request $request, $product_id){
        if($request->quantity > Product::find($product_id)->product_quantity){
            return back()->with('product_quantity_error', ''.$request->quantity.' pises products are not available now');
        }
        $product_name = Product::find($product_id)->product_name;
        if(Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->exists()){
            Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->increment('quantity', $request->quantity);
            return back()->with('cart_item_add_status', '('.$product_name.') Incremented quantity  added your cart');
        }
        else{
            Cart::insert([
                'product_id' => $product_id,
                'quantity' => $request->quantity,
                'ip_address' => $request->ip(),
                'created_at' => Carbon::now()
            ]);
            return back()->with('cart_item_add_status', '('.$product_name.') Added your cart');
        }
    }

    function cartproductdelete($cart_product_id){
        Cart::find($cart_product_id)->delete();
        return back();
    }











}
