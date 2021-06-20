<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Carbon\Carbon;
use Image;
use Auth;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    function category(){
        $categories = Category::all();
        $deleted_categories = Category::onlyTrashed()->get();
        return view('category/index', compact('categories', 'deleted_categories'));
    }

    function categorypost(Request $request){
        $request->validate([ 
            'category_name' => 'required|max:30|min:3|unique:categories,category_name'
        ], [
            'category_name.required' => 'Please Enter your Category Name:',
            'category_name.min' => 'The category name must be 3 charachter:',
        ]);
        // randomly name generate
        $category_image_name = Str::random(10) . time() . "." . $request->category_image->getClientOriginalExtension();
        // catch the photo file
        $category_photo = $request->file('category_image');
        // Uplod the photo
        Image::make($category_photo)->resize(283, 293)->save(base_path('public/image_uploads/category_image/').$category_image_name, 50);
        // this photo insert the database

        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'category_image' => $category_image_name,
            // 'created_at' => date('Y-m-d H:i:s'), This is others way for created at
            'created_at' => Carbon::now()
        ]);

        Subcategory::insert([
            'category_id' => $category_id,
            'subcategory_name' => $request->subcategory_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('category_added_status', 'Category '.$request->category_name.' added successfully!');
    }

    function categorydelete($category_id){
        if(category::where('id', $category_id)->exists()){
            Category::find($category_id)->delete();
        }
        return back()->with('category_delete_status', 'Category id '.$category_id.' Deleted Successfully!');
    }

    function categoryalldelete(){
        Category::whereNull('deleted_at')->delete();
        return back();
    }

    function categoryedit($category_id){
        $category_info = Category::find($category_id);
        return view('category/edit', compact('category_info')); 
    }

    function categoryeditpost(Request $request){
        if($request->category_name == Category::find($request->category_id)->category_name){
            return back()->withErrors('Edit your category name');
        }
        $request->validate([
            'category_name' => 'required | min:3 | max:20 | unique:categories,category_name'
        ]);
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name
        ]);
        return redirect('category')->with('category_edit_status',  'Category Edtited successfully!');
    }

    function categoryrestore($category_id){
        Category::onlyTrashed()->where('id', $category_id)->restore();
        return back();
    }

    function categoryforcedelete($category_id){
        Category::onlyTrashed()->where('id', $category_id)->forceDelete();
        return back();
    }

    function categoryallrestore(){
        Category::onlyTrashed()->restore();
        return back();
    }

    function categoryforcealldelete(){
        Category::onlyTrashed()->forceDelete();
        return back();
    }

    function categorycheckdelete(Request $request){
        if(isset($request->category_id)){
            foreach($request->category_id as $single_category_id){
            Category::find($single_category_id)->delete();
            }
            return back();
        }
        else{
            return back()->with('category_check_status', 'NO data to check !');
        }
    }



}
