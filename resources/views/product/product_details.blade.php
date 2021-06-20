@extends('layouts/tohoney')


@section('body')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="{{ route('tohoney_home') }}">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            @if (session('cart_item_add_status'))
                <div class="alert alert-success">
                    {{ session('cart_item_add_status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">

                            <div class="item">
                                <img style="width:540px; height:498px;" src="{{ asset('image_uploads/product_image') }}/{{ $product_info->product_image }}" alt="">
                            </div>
                            @foreach (App\Models\Featured_photo::where('product_id', $product_info->id)->get() as $featured_photo)
                                <div class="item">
                                    <img style="width:540px; height:498px;" src="{{ asset('image_uploads/featured_image') }}/{{ $featured_photo->featured_image_name }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img style="width:148px; height:134px;" src="{{ asset('image_uploads/product_image') }}/{{ $product_info->product_image }}" alt="">
                            </div>
                            @foreach (App\Models\Featured_photo::where('product_id', $product_info->id)->get() as $featured_photo)
                                <div class="item">
                                    <img style="width:148px; height:134px;" src="{{ asset('image_uploads/featured_image') }}/{{ $featured_photo->featured_image_name }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{ $product_info->product_name }}</h3>
                        <h6>Available Stocks : <span class="badge badge-info p-1">{{ $product_info->product_quantity }}</span></h6>
                        <div class="rating-wrap fix">
                            <h6 class="pull-left">৳ {{ $product_info->product_price }}</h6>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{ $product_info->product_short_description }}</p>
                        <form action="{{ route('addtocart', $product_info->id) }}" method="POST">
                            @csrf
                            <ul class="input-style">
                                @if (session('product_quantity_error'))
                                    <div class="alert alert-success">
                                        {{ session('product_quantity_error') }}
                                    </div>
                                @endif
                                <li class="quantity cart-plus-minus">
                                    <input type="text" value="1" name="quantity"/>
                                </li>
                                <li>
                                    <button class="btn btn-danger ml-4">Add to Cart</button>
                                </li>
                            </ul>
                        </form>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{ App\Models\Category::find($product_info->category_id)->category_name }}</a></li>
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
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{{ $product_info->product_long_description }} </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">
                                @foreach ($faq_details as $faq)
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5><button class="{{ ($loop->index==0) ? '': 'collapsed' }}" data-toggle="collapse" data-target="#collapseTwo{{ $faq->id }}" aria-expanded="false" aria-controls="collapseTwo">{{ $faq->faq_querstion }}</button></h5>
                                        </div>
                                        <div id="collapseTwo{{ $faq->id }}" class="collapse {{ ($loop->index==0) ? 'show': '' }}" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                {{ $faq->faq_answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                                <ul>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{ asset('tohoney_assets') }}/images/comment/1.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">GERALD BARNES</a></h3>
                                            <span>27 Jun, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{ asset('tohoney_assets') }}/images/comment/2.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Olive Oil</a></h3>
                                            <span>15 may, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{ asset('tohoney_assets') }}/images/comment/3.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Nature Honey</a></h3>
                                            <span>14 janu, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="add-review">
                                <h4>Add A Review</h4>
                                <div class="ratting-wrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>task</th>
                                                <th>1 Star</th>
                                                <th>2 Star</th>
                                                <th>3 Star</th>
                                                <th>4 Star</th>
                                                <th>5 Star</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>How Many Stars?</td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4>Name:</h4>
                                        <input type="text" placeholder="Your name here..." />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h4>Email:</h4>
                                        <input type="email" placeholder="Your Email here..." />
                                    </div>
                                    <div class="col-12">
                                        <h4>Your Review:</h4>
                                        <textarea name="massage" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-style">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($related_products as $related_product)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="featured-product-wrap">
                            <div class="featured-product-img">
                                <img src="{{ asset('image_uploads/product_image') }}/{{ $related_product->product_image }}" alt="">
                            </div>
                            <div class="featured-product-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h3><a href="{{ url('product/details') }}/{{ $related_product->id }}">{{ $related_product->product_name }}</a></h3>
                                        <p>৳ {{ $related_product->product_price }}</p>
                                    </div>
                                    <div class="col-5 text-right">
                                        <ul>
                                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            Nothing to show related Product !!
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- featured-product-area end -->

@endsection