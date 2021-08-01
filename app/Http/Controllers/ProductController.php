<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Featured_photo;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use Image, Auth;



class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    function product(){
        $products = Product::where('user_id', Auth::id())->get();
        $deleted_products = Product::onlyTrashed()->get();
        return view('product/index', compact('products', 'deleted_products'));
    }

    function productadd(){
        $categories = Category::all();
        return view('product/product_add', compact('categories'));
    }
    
    function productpost(Request $request){
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required | min:10 | max:100',
            'product_price' => 'required',
            'product_quantity' => 'required | integer',
            'product_short_description' => 'required | min:60',
            'product_long_description' => 'required | min:80',
            'alert_quantity' => 'required | integer',
            'product_image' => 'required | mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10000',
            // 'featured_image_name' => 'required | mimes:jpg,jpeg,png,bmp,gif,svg,webp'
        ],[
            'category_id.required' => 'The Category Name field is required',
         ]);
        // randomly name generate
        $random_product_image_name = Str::random(10) . time() . "." . $request->product_image->getClientOriginalExtension();
        // catch the photo file
        $product_photo = $request->file('product_image');
        // Uplod the photo
        Image::make($product_photo)->resize(283, 293)->save(base_path('public/image_uploads/product_image/').$random_product_image_name, 50);
        // this photo insert the database
        $product_id = Product::insertGetId($request->except('_token', 'product_image', 'featured_image_name') + [
            'user_id' => Auth::id(),
            'product_image' => $random_product_image_name,
            'created_at' => Carbon::now()
        ]);

        foreach($request->file('featured_image_name') as $single_image){
            // randomly generate image name 
            $product_image_name = Str::random(10) . time() . "." . $single_image->getClientOriginalExtension();
            // catch the photo file
            $product_feature_photo = $single_image;
            // Upload the photo
            Image::make($product_feature_photo)->resize(283, 293)->save(base_path('public/image_uploads/featured_image/').$product_image_name, 50);

            Featured_photo::insert([
                'product_id' => $product_id,
                'featured_image_name' => $product_image_name,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('product_add_status', 'Your Product Successfully Uploaded!');
    }

    function productedit($product_id){
        $product_info = Product::find($product_id);
        $categories = Category::all();
        return view('product/edit', compact('product_info', 'categories'));
    }

    function editproductpost(Request $request, $product_id){
        if($request->hasFile('product_new_image')){
            // delete old photo
            $old_photo_path = base_path('public/image_uploads/product_image/') . Product::find($product_id)->product_image;
            unlink($old_photo_path);
            // randomly name generate
            $product_image_name = Str::random(10) . time() . "." . $request->product_new_image->getClientOriginalExtension();
            // catch the photo file
            $product_photo = $request->file('product_new_image');
            // Uplod the photo
            Image::make($product_photo)->resize(283, 293)->save(base_path('public/image_uploads/product_image/').$product_image_name, 50);
            // Tell the Database about new photo
            Product::find($product_id)->update([
                'product_image' => $product_image_name,
            ]);
        }
        Product::find($product_id)->update($request->except('_token'));
        return redirect('product')->with('product_update_status', 'Product Information Successfully Updated !');
    }

    function productdelete($product_id){
        if(product::where('id', $product_id)->exists()){
            product::find($product_id)->delete();
        }
        return back()->with('product_delete_status', 'Product id '.$product_id.' Deleted Successfully!');
    }

    function productalldelete(){
        Product::whereNull('deleted_at')->delete();
        return back();
    }

    function productrestore($product_id){
        Product::onlyTrashed()->where('id', $product_id)->restore();
        return back();
    }

    function productallrestor(){
        Product::onlyTrashed()->restore();
        return back();
    }

    function productforcedelete($product_id){
        Product::onlyTrashed()->where('id', $product_id)->forceDelete();
        return back();
    }

    function productforcealldelete(){
        Product::onlyTrashed()->forceDelete();
        return back();
    }

}
