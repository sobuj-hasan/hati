<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;


class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }
    
    function subcategory(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('subcategory.index', compact('categories', 'subcategories'));
    }

    function subcategorypost(Request $request){
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('subcategory_added_status', 'Sub-category created successfully!');
    }

}
