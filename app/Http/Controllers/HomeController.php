<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user, App\Models\Order, App\Models\Order_details;
use Auth;
use PDF;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $users = user::latest()->get();
        $orders = Order::where('user_id',Auth::id())->latest()->get();
        return view('home', compact('users', 'orders'));
    }
    public function downloadinvoice($order_id){
        $data = Order::find($order_id);
        $order_details = Order_details::where('order_id',$order_id)->get();
        $pdf = PDF::loadView('pdf.invoice', compact('data', 'order_details'));
        return $pdf->stream('invoice.pdf');
    }




    
}
