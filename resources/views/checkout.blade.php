@extends('layouts.tohoney')

@section('body')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    @auth

        @if (Auth::user()->role == 2)
            <div class="checkout-area ptb-100">
                <div class="container">
                    <form action="{{ route('checkoutpost') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="checkout-form form-style">
                                    <h3>Billing Details</h3>
                                    <div class="alert alert-info">
                                        <p>Loged In as 
                                            <span>({{ auth::user()->name }})</span>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Name *</p>
                                            <input type="text" value="{{ auth::user()->name }}" name="customer_name">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Email Address *</p>
                                            <input type="email" value="{{ auth::user()->email }}" name="customer_email">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Phone No. *</p>
                                            <input type="text" value="{{ auth::user()->phone }}" name="customer_phone">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Country *</p>
                                            <select id="country_list" name="customer_country">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>City *</p>
                                            <select id="city_list" name="customer_city">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>                                
                                        <div style="padding-top: 25px;" class="col-6">
                                            <p>Your Address *</p>
                                            <input type="text" name="customer_address">
                                        </div>
                                        <div style="padding-top: 25px;" class="col-sm-6 col-12">
                                            <p>Postcode/ZIP</p>
                                            <input type="text" name="customer_postcode">
                                        </div>                  
                                        <div class="col-12">
                                            <p>Order Notes </p>
                                            <textarea name="customer_message" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="order-area">
                                    <h3>Your Order</h3>
                                    <ul class="total-cost">
                                        <li>Subtotal <span class="pull-right"><strong>৳ {{ session('session_subtotal') }}</strong></span></li>
                                        <li>Coupon Name <span class="pull-right"><strong>{{ session('session_coupon_name') ? session('session_coupon_name'):"N/A" }}</strong></span></li>
                                        <li>Coupon Discount(%) <span class="pull-right"><strong>{{ session('session_coupon_discount') }}</strong></span></li>
                                        <li>Total Amount <span class="pull-right">৳ {{ session('session_total_amount') }}</span></li>
                                    </ul>
                                    <ul class="payment-method">                      
                                        <li>
                                            <input id="card" type="radio" name="payment_option" value="1">
                                            <label for="card">Credit Card</label>
                                        </li>
                                        <li>
                                            <input id="delivery" type="radio" name="payment_option" value="2">
                                            <label for="delivery">Cash on Delivery</label>
                                        </li>
                                    </ul>
                                    <button class="" type="submit">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="checkout-area ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout-form form-style">
                                <h3>Billing Details</h3>
                                <div class="alert alert-info">
                                    <h3 class="text-danger">You are a Admin, You can not Checkout!</h3>
                                    <p>Loged In as 
                                        <span>({{ auth::user()->name }})</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 m-auto">
                    <div class="alert alert-danger">
                        <h6 class="mt-2">Website: <span style="margin-left: 150px;">Mini Shop / minishop.com.bd</span></h6>
                        <h6>Status: <span style="margin-left: 160px;">You are Not Loged in!!</span></h6>
                        <h6>Have a account: <span><a style="margin-left: 84px;" class="btn btn-outline-info" href="{{ url('login') }}">Login Here</a></span></h6>
                        <h6>New Account: <span><a style="margin-left: 105px;" class="btn btn-outline-info" href="{{ url('register') }}">Register Here</a></span></h6>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endauth
    <!-- checkout-area end -->    
@endsection

@section('footer_scripts')
<script>
    $(document).ready(function() {
        $('#country_list').select2();
        $('#city_list').select2();
        $('#country_list').change(function(){
            var country_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'get/city/list',
                data: {country_id:country_id},
                success: function(data){
                    $('#city_list').html(data);
                }
            });

        });
    });
</script>
@endsection
