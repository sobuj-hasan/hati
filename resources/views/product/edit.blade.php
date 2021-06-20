@extends('layouts.starlight')

@section('title')
    Edit Product
@endsection
@section('product')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('product') }}">Product</a>
        <span class="breadcrumb-item active">Edit Product</span>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-lg-8 m-auto">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary h6 p-3">
                        Edit Product Information
                    </div>
                    <div class="card-body"> 
                        <form action="{{ route('editproductpost', $product_info->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Category Name:</label>
                                <select class="form-control" name="category_id">
                                    <option value="">--Choose One--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ ($product_info->category_id == $category->id)? 'selected': '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name:</label>
                                <input type="text" class="form-control" value="{{ $product_info->product_name }}" name="product_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Price:</label>
                                <input type="text" class="form-control" value="{{ $product_info->product_price }}" name="product_price">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Quantity:</label>
                                <input type="text" class="form-control" value="{{ $product_info->product_quantity }}" name="product_quantity">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product short description:</label>
                                <textarea class="form-control" id="" rows="2" name="product_short_description">{{ $product_info->product_short_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product long description:</label>
                                <textarea class="form-control" id="" rows="4" name="product_long_description">{{ $product_info->product_long_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alert Quantity:</label>
                                <input type="text" class="form-control" value="{{ $product_info->alert_quantity }}" name="alert_quantity">
                            </div>

                            <div class="form-group">
                                <label>Product current Photo:</label><br>
                                <img width="160px" height="140px" src="{{ asset('image_uploads/product_image/'.$product_info->product_image) }}" alt="product image">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Image</label>
                                <input type="file" class="form-control" name="product_new_image">
                            </div>

                            <button type="submit" class="btn btn-primary">Save Now</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

{{-- @section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#delete_all_btn').click(function(){
                Swal.fire({
                title: 'Are you sure You want to all soft delete ?',
                // text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "category/all/delete/";
                }
                })
            });
            
            $('#force_delete_all_btn').click(function(){
                Swal.fire({
                title: 'Are you sure You want to all soft delete ?',
                // text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "category/force/all/delete/";
                }
                })
            });

            $('#check_all_btn').click(function (){
                $('.delete_checkbox').attr("checked", "checked");
            });

            $('#uncheck_all_btn').click(function (){
                $('.delete_checkbox').removeAttr("checked");
            });

        });
    </script>
@endsection --}}


