<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Carbon\Carbon;



class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    function faq(){
        $faq_details = Faq::latest()->limit(6)->get();
        return view('faq/index', compact('faq_details'));
    }

    function faqpost(Request $request){
        $request->validate([
            'faq_querstion' => 'required',
            'faq_answer' => 'required'
        ]);
        Faq::insert([
            'faq_querstion' => $request->faq_querstion,
            'faq_answer' => $request->faq_answer,
            'created_at' => Carbon::now()
        ]);
        return back()->with('faq_add_status', 'Faq Added Successfully!');
    }

    function faqdelete($faq_id){
        Faq::find($faq_id)->delete();
        return back()->with('faq_delete_status', 'Faq id '.$faq_id.' deleted successfully!');
    }



}
