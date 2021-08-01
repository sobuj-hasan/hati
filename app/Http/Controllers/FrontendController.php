<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Category, App\Models\Product, App\Models\Cartorder, App\Models\Order_details;
    use App\Models\Cart;
    use App\Models\Coupon;
    use App\Models\Setting;
    use App\Models\Faq;
    use App\Models\User;
    use App\Models\Country;
    use App\Models\City;
    use Carbon\Carbon;
    use Auth;
    use Notify;
    use Hash;

    class FrontendController extends Controller {

        function home(){
            $categories = Category::all();
            $products_all = Product::latest()->limit(8)->get();
            return view('index', compact('categories', 'products_all'));
        }
        function about(){
            $names = ["saiful", "Islam", "Akash", "Shamim", 234, "Islam Mahmud"];
            return view('about', compact('names'));
        }
        function contact(){
            $settings = Setting::all();
            return view('contact', compact('settings'));
        }
        function service(){
            return view('contact');
        }
        function productdetails($product_id){
            $product_category_id = Product::findOrFail($product_id)->category_id;
            $related_products = Product::where('category_id', $product_category_id)->where('id', '!=', $product_id)->get();
            $product_info = Product::findOrFail($product_id);
            $faq_details = Faq::all();
            return view('product/product_details', compact('product_info', 'faq_details', 'related_products'));
        }

        function shop(){
            $products_all = Product::inRandomOrder()->get();
            $categories = Category::all();
            return view('shop', compact('products_all', 'categories'));
        }

        function categorywiseshop($category_id){
            $products = Product::where('category_id', $category_id)->get();
            $category_name = Category::find($category_id);
            return view('categorywiseshop', compact('products', 'category_name'));
        }
        function cart($coupon_name = ""){
            $coupon_discount = 0;
            if($coupon_name == ""){
                $coupon_discount = 0;
            }else{
                if(Coupon::where('coupon_name', $coupon_name)->exists()){
                    if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_name)->first()->expire_date){
                        return back()->with('date_expire', 'This coupon date experied');
                    }
                    else{
                        if(Coupon::where('coupon_name', $coupon_name)->first()->uses_limit > 0){
                            $coupon_discount = Coupon::where('coupon_name', $coupon_name)->first()->coupon_discount;
                        }
                        else{
                            return back()->with('uses_limit', 'This Coupon uses limit overed!');
                        }
                    }
                }
                else{
                    return back()->with('invalid_coupon', 'This Coupon is Invalid!');
                }
            }
            return view('cart',[
                'carts' => Cart::where('ip_address', request()->ip())->get(),
                'coupon_name' => $coupon_name,
                'coupon_discount' => $coupon_discount
            ]);
        }
        function updatecart(Request $request){
            foreach ($request->quantity as $cart_id => $quantity) {
                if (Product::find(Cart::find($cart_id)->product_id)->product_quantity >= $quantity) {
                    Cart::find($cart_id)->update([
                        'quantity' => $quantity
                    ]);
                }else{
                    Notify::error('Quantity not available', 'error');
                    return back();
                }
            }
            Notify::success('Your cart Updated', 'Success');
            return back();
        }
        function checkout(){
            return view('checkout', [
                'countries' => Country::select('id', 'name')->get()
            ]);
        }
        function customerregister(){
            return view('customerregister');
        }

        function customerregisterpost(Request $request){
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 2,
                'created_at' => Carbon::now()
            ]);
            return back();
        }
        function customerlogin(){
            return view('customerlogin');
        }
        function customerloginpost(Request $request){
            // return $request->email;
            if(User::where('email', $request->email)->exists()){
                $db_password = User::where('email', $request->email)->first()->password;
                if(Hash::check($request->password, $db_password)){
                    // All checking Good
                    if(Auth::attempt($request->except('_token'))){
                        return redirect()->intended('/');
                    }
                }
                else{
                    Notify::error('Email or Password wrong !', 'error');
                    return back()->with('customer_login_error', "Your Email or Password is Worng!");
                }
            }
            else{
                Notify::error("Email don't matched our records", 'error');
                return back()->with('customer_login_error', "This Email Don't match our records!");
            }
        }
        function getcitylist(Request $request){
            $string_send = "";
            foreach (City::where('country_id', $request->country_id)->select('id', 'name')->get() as $city) {
                $string_send = $string_send."<option value='".$city->id."'>$city->name</option>";
            }
            echo $string_send;
        }
        function checkoutpost(Request $request){
            if($request->payment_option == 1){
                return redirect('online/payment');
            }else{
                $request->validate([
                    'customer_name' => 'required',
                    'customer_email' => 'required',
                    'customer_phone' => 'required',
                    'customer_country' => 'required',
                    'customer_city' => 'required',
                    'customer_address' => 'required',
                    'customer_postcode' => 'required',
                    'customer_message' => 'required',
                ]);
                $order_id = Cartorder::insertGetId($request->except('_token') + [
                    'user_id' => auth::id(),
                    'discount' => session('session_coupon_discount'),
                    'subtotal' => session('session_subtotal'),
                    'total' => session('session_total_amount'),
                    'payment_status' => 1,
                    'created_at' => Carbon::now(),
                ]);
                $carts = Cart::where('ip_address', request()->ip())->select('id', 'product_id', 'quantity')->get();
                foreach ($carts as $cart) {
                    Order_details::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'created_at' => Carbon::now(),
                    ]);
                    Product::find($cart->product_id)->decrement('product_quantity', $cart->quantity);
                    Cart::find($cart->id)->delete();
                }
                Notify::success('Your Order in successfully Placed', 'Success');
                return redirect('home');
            }
        }
    }
