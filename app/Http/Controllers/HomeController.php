<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        // $users = user::limit(5)->get();     // Show only 5 data from database
        // $users = user::latest()->get();       // First show the Latest data
        // $users = user::All();                 // Show all data from Database
        
        $users = user::latest()->paginate(7);
        return view('home', compact('users'));
    }





    
}
