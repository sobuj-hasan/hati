<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user, App\Models\CartOrder, App\Models\Order_details;
use Auth;
use PDF;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $users = user::latest()->get();
        $orders = Cartorder::where('user_id',Auth::id())->latest()->get();

            // last week users infomation
            // $january = date('Y-m-d', strtotime('saturday last week'));
            // $last_friday = date('Y-m-d', strtotime('friday this week'));
            // $last_week_query = "SELECT * FROM users WHERE `user_join_date` between '$last_saturday' and '$last_friday'";
            // $last_week_info = mysqli_query($np2con, $last_week_query);
            // last monthy users infomation 
            // $last_month = date('Y-m-d', strtotime('last month'));
            // $this_month = date('Y-m-d', strtotime('this month'));
            // $last_month_query = "SELECT * FROM users WHERE `user_join_date` between '$last_month' and '$this_month'";
            // $last_month_info = mysqli_query($np2con, $last_month_query);

        return view('home', compact('users', 'orders'));
    }
    public function userlist()
    {   
        $users = user::latest()->get();
        return view('userlist', compact('users'));
    }
    public function downloadinvoice($order_id){
        $data = Cartorder::find($order_id);
        $order_details = Order_details::where('order_id',$order_id)->get();
        $pdf = PDF::loadView('pdf.invoice', compact('data', 'order_details'));
        $invoice_name = "invoice".Carbon::now()."-".$order_id.".pdf";
        return $pdf->stream($invoice_name);
    }
    
}
