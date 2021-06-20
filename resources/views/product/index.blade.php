@extends('layouts.starlight')

@section('title')
    Category
@endsection
@section('product')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Products</span>
        <a class="btn btn-info ml-4" href="{{ url('product/product_add') }}">add new product</a>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="card text-white my-5">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="col-lg-6 m-auto">
                                        <h5>Product List :</h5> 
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        @if (count($products) == !0)
                                            <a class="btn btn-danger" href="{{ url('product/all/delete') }}">Delete All</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('product_delete_status'))
                                    <div class="alert alert-success">
                                        {{ session('product_delete_status') }}
                                    </div>
                                @endif

                                @if (session('product_add_status'))
                                    <div class="alert alert-success">
                                        {{ session('product_add_status') }}
                                    </div>
                                @endif

                                @if (session('product_update_status'))
                                    <div class="alert alert-success">
                                        {{ session('product_update_status') }}
                                    </div>
                                @endif

                                <table class="table table-bordered my-2">
                                    <div class="btn-group">
                                        <button class="btn btn-info" id="check_all_btn" href="#">Check all</button>
                                        <button class="btn btn-warning" id="uncheck_all_btn" href="#">Uncheck all</button>
                                        <button class="btn btn-danger" id="check_delete_btn" href="#">Delete all</button>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th scope="col">Mark all</th>
                                            <th scope="col">Product ID</th>
                                            <th scope="col">Category Name </th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Alert Quantity</th>
                                            <th scope="col">Added By</th>
                                            <th scope="col">Created at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" class="check_delete_btn">
                                                </td>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>
                                                    <img width="80px" height="80px" src="{{ asset('image_uploads\product_image') }}\{{ $product->product_image }}" alt="image">
                                                </td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>{{ $product->alert_quantity }}</td>
                                                <td>
                                                    {{ App\Models\User::find($product->user_id)->name }}
                                                </td>
                                                <td>{{ $product->created_at->format('d/m/Y h:i:s A') }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ url('product/edit') }}/{{ $product->id }}" type="button" class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ url('product/delete') }}/{{ $product->id }}" type="button" class="btn btn-sm btn-danger">Delete</a>
                                                    </div>
                                                </td>
                                            </tr> 
                                            @empty
                                            <tr class="text-center">
                                                <td colspan="60">No Data Availabele</td>
                                            </tr>                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 m-auto">
                        <div class="card text-white">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="col-lg-6 m-auto">
                                        <h6>Deleted Product List :</h6>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        @if (count($deleted_products) == !0)
                                            <a class="btn btn-success" href="{{ url('product/all/restore') }}">Restore All</a>
                                            <a class="btn btn-danger" href="{{ url('product/force/all/delete') }}">Force Delete All</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- @if (session('product_delete_status'))
                                    <div class="alert alert-success">
                                        {{ session('product_delete_status') }}
                                    </div>
                                @endif --}}
                                
                                {{-- @if (session('product_edit_status'))
                                    <div class="alert alert-success">
                                        {{ session('product_edit_status') }}
                                    </div>
                                @endif --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product ID</th>
                                            <th scope="col">Category Name </th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Alert Quantity</th>
                                            {{-- <th scope="col">Created at</th> --}}
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deleted_products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>{{ $product->alert_quantity }}</td>
                                                {{-- <td>{{ $product->created_at->format('d/m/Y h:i:s A') }}</td> --}}
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ url('product/restore') }}/{{ $product->id }}" type="button" class="btn btn-sm btn-success">Restore</a>
                                                        <a href="{{ url('product/force/delete') }}/{{ $product->id }}" type="button" class="btn btn-sm btn-danger">ForceDelete</a>
                                                    </div>
                                                </td>
                                            </tr> 
                                            @empty
                                            <tr class="text-center">
                                                <td colspan="60">No Data Availabele</td>
                                            </tr>                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('footer_scripts')
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
                $('.check_delete_btn').attr('checked', 'checked');
            });

            $('#uncheck_all_btn').click(function (){
                $('.check_delete_btn').removeAttr('checked');
            });

        });
    </script>
@endsection




