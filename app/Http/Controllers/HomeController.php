<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user, App\Models\CartOrder, App\Models\Order_details;
use Auth;
use PDF;
use Notify;
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

        $credit_cart = Cartorder::where('payment_option', 1)->count();

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
    public function sendsms(Request $request){
        $customer_info = Cartorder::select('customer_name', 'customer_phone')->get();
        foreach ($customer_info as $single_info) {
            $url = "http://66.45.237.70/api.php";
            $number="$request->numbers";
            $text="Hi Dear $single_info->customer_name, $request->message";
            $data= array(
            'username'=>"01834833973", // Sohan sir er account
            'password'=>"TE47RSDM",  // Sohan sir er account
            'number'=>"$number",
            'message'=>"$text"
            );

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|",$smsresult);
            $sendstatus = $p[0];
        }
        Notify::success('Your msg submitted your customer!', 'Success');
        return back();
    }
}
