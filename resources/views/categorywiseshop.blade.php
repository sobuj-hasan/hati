@extends('layouts.tohoney')

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
                            <li><span>{{ $category_name->category_name }}</span></li>
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

        {{-- <div class="row">
            <div class="col-sm-10 col-lg-8 m-auto">
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        <li mb-4>
                            <a class="active" data-toggle="tab" href="#all">{{ $category_name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}

        <ul class="row">
            @foreach ($products as $product)
                @include('little_parts/product_part')
            @endforeach
        </ul>
    </div>
</div>
<!-- product-area end -->

@endsection