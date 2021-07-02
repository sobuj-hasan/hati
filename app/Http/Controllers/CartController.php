<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Notify;


class CartController extends Controller
{
    function addtocart(Request $request, $product_id){
        if($request->quantity > Product::find($product_id)->product_quantity){
            Notify::error("$request->quantity pises products not available", "error");
            return back();
        }
        $product_name = Product::find($product_id)->product_name;
        if(Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->exists()){
            Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->increment('quantity', $request->quantity);
            Notify::success('Incremented quantity  added your cart', 'success');
            return redirect(url('shop'));
        }
        else{
            Cart::insert([
                'product_id' => $product_id,
                'quantity' => $request->quantity,
                'ip_address' => $request->ip(),
                'created_at' => Carbon::now()
            ]);
            Notify::success('This Item Added your cart', 'success');
            return back();
        }
    }
    function cartproductdelete($cart_product_id){
        Cart::find($cart_product_id)->delete();
        Notify::info('This Item delete your cart', 'Deleted');
        return back();
    }











}
