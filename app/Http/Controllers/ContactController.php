<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMessages;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    function guest(Request $request){
        $request->validate([
            'fast_name' => 'required | max:30',
            'email' => 'required | email',
            'subject' => 'required | max:50',
            'message' => 'required'
        ]);
        Contact::insert($request->except('_token') + [
            'created_at' => Carbon::now()
        ]);

        // guest message direct get my Gamil account
        Mail::to('sobujhasan388@gmail.com')->send(new SendMessages($request->message));
        return back()->with('msg_send_status', 'Your Message sent successfully!');
    }

    function guestmsg(){
        $guest_msg = Contact::all();
        return view('contact.index', compact('guest_msg'));
    }

    function guestmsgdelete($guest_id){
        $guest_name = Contact::find($guest_id)->fast_name;
        Contact::find($guest_id)->delete();
        return back()->with('guest_msg_status', ''.$guest_name.' information deleted successfully!');
    }



}
