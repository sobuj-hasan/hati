@extends('layouts.starlight')
@section('title')
    Add new product
@endsection
@section('product')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('product') }}">Product List</a>
        <span class="breadcrumb-item active">add product</span>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto">
                <div class="card text-dark">
                    <!-- Javascript code for use Editor in description --> 
                    <script src="https://cdn.tiny.cloud/1/vigzuofqlllea0ve8vxs2ppmfw5n2m92h9l2bv4wlfj9c17y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                    <script>
                        tinymce.init({
                        selector: '.mytextarea'
                        });
                    </script>

                    <div class="card-header text-white bg-primary h6">
                        Add New Product
                    </div>
                    @if (session('product_add_status'))
                        <div class="alert alert-success">
                            {{ session('product_add_status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('productpost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Category Name:</label>
                                <select id="category_id" class="form-control" name="category_id">
                                    <option value="">--Choose Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Subcategory Name:</label>
                                <select class="form-control" name="subcategory_id">
                                    <option value="">--Sub Category--</option>
                                    
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name:</label>
                                <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Price:</label>
                                <input type="text" class="form-control" name="product_price" value="{{ old('product_price') }}">
                                @error('product_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Quantity:</label>
                                <input type="text" class="form-control" name="product_quantity" value="{{ old('product_quantity') }}">
                                @error('product_quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group"> 
                                <option class="text-dark h6">Product short description: </option>
                                <textarea rows="6" name="product_short_description" cols="60" class="mytextarea"></textarea>
                            </div>
                            @error('product_short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group"> 
                                <option class="text-dark h6">Product long description:</option>
                                <textarea rows="6" name="product_long_description" cols="60" class="mytextarea"></textarea>
                            </div>
                            @error('product_long_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alert Quantity:</label>
                                <input type="text" class="form-control" name="alert_quantity">
                                @error('alert_quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Image</label>
                                <input type="file" class="form-control" name="product_image">
                                @error('product_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Featured Photos</label>
                                <input type="file" class="form-control" name="featured_image_name[]" multiple value="{{ old('featured_image_name[]') }}">
                                @error('featured_image_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('footer_scripts')
<script>
    $(document).ready(function() {
        $('#category_id').change(function(){
            var category_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'get/category',
                data: {category_id:category_id},
                success: function(data){
                    alert(data);
                }
            });
        });
    });
</script>
@endsection --}}


