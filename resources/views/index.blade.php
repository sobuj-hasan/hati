@extends('layouts.tohoney')
@section('body')  
<!-- slider-area start -->
<div class="slider-area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide overlay" style="background: url({{ asset('tohoney_assets/images/slider/18.jpg') }});">
                <div class="single-slider slide-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Fast food delivery in Dhaka</h2>
                                        <p data-swiper-parallax="-400">As the bustling capital of Bangladesh, it's no wonder that Dhaka's culinary scene is something special. This cultural hub offers plenty in the way of delicious dishes</p>
                                        <a href="{{ route('shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner" style="background: url({{ asset('tohoney_assets/images/slider/22.jpg') }});">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Best Fine Dining Restaurants in Dhaka</h2>
                                        <p data-swiper-parallax="-400">If you want to spend a quality ti.e in cozy environment with good food, it is your place.</p>
                                        <a href="{{ route('shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner" style="background: url({{ asset('tohoney_assets/images/slider/23.jpg') }});">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">All-in-One Solution About our My Super Shop</h2>
                                        <p data-swiper-parallax="-400">My Super Shop is an e-commerce platform that provides the facility to purchase different imported grocery items in Bangladesh.</p>
                                        <a href="{{ route('shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner" style="background: url({{ asset('tohoney_assets/images/slider/24.jpg') }});">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Largest Gold Jewellery Shop in Bangladesh</h2>
                                        <p data-swiper-parallax="-400">AL-AMIN JEWELLERS is a gold jewelry brand established in Bangladesh. Since 2000 it’s providing the best and luxurious gold jewelry ornaments with unique design.</p>
                                        <a href="{{ route('shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner" style="background: url({{ asset('tohoney_assets/images/slider/14.jpg') }});">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Shop for Online Clothes Shopping</h2>
                                        <p data-swiper-parallax="-400">MINIshop is one of the largest online wholesale boutique clothing vendor in Bangladesh that Serving more than 20,000 wholesalers, retailers, and distributors. Since 2013, we supply a wide range of inexpensive and high-quality wholesale fashion apparel to the world</p>
                                        <a href="{{ route('shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- slider-area end -->
<!-- featured-area start -->
<div class="featured-area featured-area2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-active2 owl-carousel next-prev-style">
                    @foreach ($categories as $category)
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img style="width: 315px; height: 250px;" src="{{ asset('image_uploads/category_image') }}/{{ $category->category_image }}" alt="category img">
                                <div class="featured-content">
                                    <a href="{{ route('categorywiseshop', $category->id) }}">{{ $category->category_name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured-area end -->
<!-- start count-down-section -->
<div class="count-down-area count-down-area-sub">
    <section class="count-down-section section-padding parallax" data-speed="7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <div class="count-down-clock text-center">
                        <div id="clock">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
</div>
<!-- end count-down-section -->
<!-- product-area start -->
<div class="product-area product-area-2">
    <div class="fluid-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Best Seller</h2>
                        <img src="{{ asset('tohoney_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                <li class="col-xl-2 col-lg-3 col-sm-4 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <img height="210px" src="{{ asset('tohoney_assets') }}/images/product/1.jpg" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="single-product.html">Nature Honey</a></h3>
                            <p class="pull-left">$125
    
                            </p>
                            <ul class="pull-right d-flex">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- product-area end -->
<!-- product-area start -->
<div class="product-area">
    <div class="fluid-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest Product</h2>
                        <img src="{{ asset('tohoney_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @foreach ($products_all as $product)
                    <li class="col-xl-2 col-lg-3 col-sm-4 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img style="height:210px"; src="{{ asset('image_uploads/product_image') }}/{{ $product->product_image }}" alt="product-img">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ url('product/details') }}/{{ $product->id }}">{{ $product->product_name }}</a></h3>
                                <p class="pull-left">৳ {{ $product->product_price }}</p>
                                <ul class="pull-right d-flex">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Modal area start -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body d-flex">
                                    <div class="product-single-img w-50">
                                        <img src="{{ asset('image_uploads/product_image') }}/{{ $product->product_image }}" alt="">
                                    </div>
                                    <div class="product-single-content w-50">
                                        <h3>{{ $product->product_name }}</h3>
                                        <div class="rating-wrap fix">
                                            <span class="pull-left">$219.56</span>
                                            <ul class="rating pull-right">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li>(05 Customar Review)</li>
                                            </ul>
                                        </div>
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire denounce with righteous indignation</p>
                                        <ul class="input-style">
                                            <li class="quantity cart-plus-minus">
                                                <input type="text" value="1" />
                                            </li>
                                            <li><a href="cart.html">Add to Cart</a></li>
                                        </ul>
                                        <ul class="cetagory">
                                            <li>Categories:</li>
                                            <li><a href="#">Honey,</a></li>
                                            <li><a href="#">Olive Oil</a></li>
                                        </ul>
                                        <ul class="socil-icon">
                                            <li>Share :</li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal area start -->
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- product-area end -->
<!-- testmonial-area start -->
<div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h2>What Our client Says</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12">
                <div class="testmonial-active owl-carousel">
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="{{ asset('tohoney_assets') }}/images/test/1.png" alt="">
                        </div>
                    </div>
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="{{ asset('tohoney_assets') }}/images/test/1.png" alt="">
                        </div>
                    </div>
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="{{ asset('tohoney_assets') }}/images/test/1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testmonial-area end -->
@endsection








