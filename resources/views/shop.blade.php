@extends('layouts.tohoney')

@section('body')
<!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2> Shop Now </h2>
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
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-lg-8 m-auto">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li mb-4>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="mb-4">
                                    <a data-toggle="tab" href="#dynamic_id_{{ $category->id }}">{{ $category->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">

                        @foreach ($products_all as $product)
                            @include('little_parts/product_part')
                        @endforeach

                        <li class="col-12 text-center">
                            <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                        </li>
                    </ul>
                </div>
                @foreach ($categories as $category)
                    <div class="tab-pane" id="dynamic_id_{{ $category->id }}">
                        <ul class="row">
                            @foreach (App\Models\Product::where('category_id', $category->id)->get() as $product)
                                @include('little_parts/product_part')
                            @endforeach
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- product-area end -->
@endsection