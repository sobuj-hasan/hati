@extends('layouts.tohoney')

@section('body')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('updatecart') }}" method="POST">
                    @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product Name</th>
                                <th class="instock">In Stock</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $flag = false;
                                $total = 0;
                            @endphp
                            @if (session('stock_available_status'))
                                <div class="alert alert-danger">
                                    {{ session('stock_available_status') }}
                                </div>
                            @endif
                            @forelse ($carts as $cart)
                                <tr>
                                    <td class="images">
                                        <img width="70px" height="70px" src="{{ asset('image_uploads/product_image/') }}/{{ $cart->rlsntoproduct->product_image }}" alt="">
                                    </td>
                                    <td class="product">
                                        <a href="{{ url('product/details', $cart->product_id) }}">
                                            {{ $cart->rlsntoproduct->product_name }}
                                            @if ($cart->rlsntoproduct->product_quantity < $cart->quantity)
                                                <span class="badge badge-danger">Please Decrement Quantity</span>
                                                @php
                                                    $flag = true;
                                                @endphp
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge badge-info p-2">{{ $cart->rlsntoproduct->product_quantity }}</span>
                                    </td>
                                    <td class="ptice"> 
                                        ৳ {{ $cart->rlsntoproduct->product_price }}
                                    </td>
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" value="{{ $cart->quantity }}" name="quantity[{{ $cart->id }}]"/>
                                    </td>
                                    <td class="total">
                                        {{ $cart->rlsntoproduct->product_price * $cart->quantity }}
                                        @php
                                            $total += ($cart->rlsntoproduct->product_price * $cart->quantity);
                                        @endphp
                                    </td>
                                    <td class="remove">
                                        <a href="{{ route('cartproductdelete', $cart->id) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <div>
                                    <tr>
                                        <td colspan="80">No Item Added Your Cart</td>
                                    </tr>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <a href="{{ url('shop') }}">Continue Shopping</a>
                                    </li>
                                    <li>
                                        <button type="submit">Update Cart</button>
                                    </li>
                                </ul>
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <input type="text" id="apply_coupon_input" placeholder="Cupon Code" value="{{ $coupon_name }}">
                                    @if (session('coupon_name'))
                                        <span class="text-danger">
                                            {{ session('coupon_name') }}
                                        </span>
                                    @endif
                                    @if (session('uses_limit'))
                                        <span class="text-danger">
                                            {{ session('uses_limit') }}
                                        </span>
                                    @endif
                                    @if (session('invalid_coupon'))
                                        <span class="text-danger">
                                            {{ session('invalid_coupon') }}
                                        </span>
                                    @endif
                                    <button type="button" id="apply_coupon" >Apply Cupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left">Subtotal : </span> ৳ {{ $total }}</li>
                                    <li><span class="pull-left"> Discount : </span> {{ $coupon_discount }} (%)</li>
                                    <li><span class="pull-left"> <small>Discount (amount):</small> </span>৳ {{ $coupon_discount/100 * $total }}</li>
                                    <li><span class="pull-left"> Total : </span> ৳ {{ $total - ($coupon_discount/100 * $total) }}</li>
                                    @php
                                        session([
                                            'session_subtotal' => $total,
                                            'session_coupon_name' => $coupon_name,
                                            'session_coupon_discount' => $coupon_discount,
                                            'session_total_amount' => $total - ($coupon_discount/100 * $total),
                                        ])
                                    @endphp
                                </ul>
                                @if ($flag)
                                    <button style="cursor: wait; margin-top: 15px;" type="button" class="btn btn-danger text-white disabled">Cart page Defective</button>
                                @else
                                    <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->
@endsection

@section('footer_scripts')
<script>
    $(document).ready(function (){
        $('#apply_coupon').click(function (){
            var coupon_name = $('#apply_coupon_input').val();
            var link_to_go = "{{ url('cart') }}/" + coupon_name;
            window.location.href = link_to_go;
        });
    });
</script>
@endsection