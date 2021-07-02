<li class="col-xl-2 col-lg-3 col-sm-4 col-12">
    <div class="product-wrap">
        <div class="product-img">
            <span>Sale</span>
            <img style="height:210px"; src="{{ asset('image_uploads/product_image') }}/{{ $product->product_image }}" alt="product-img">
            <div class="product-icon flex-style">
                <ul>
                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
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






