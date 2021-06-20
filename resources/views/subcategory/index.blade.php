@extends('layouts.starlight')

@section('title')
    Sub-Category
@endsection
@section('subcategory')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Sub Category</span>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary">
                        <div class="row">
                            <div class="col-lg-6 h5">
                                Sub-Category List:
                            </div>
                            <div class="col-lg-6 text-right">
                                @if ($subcategories->count() == !0)
                                    <a id="delete_all_btn" class="btn btn-danger">Delete All</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('category_delete_status'))
                            <div class="alert alert-success">
                                {{ session('category_delete_status') }}
                            </div>
                        @endif

                        @if (session('category_edit_status'))
                            <div class="alert alert-success">
                                {{ session('category_edit_status') }}
                            </div>
                        @endif

                        @if (session('category_check_status'))
                            <div class="alert alert-danger">
                                {{ session('category_check_status') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"> Mark </th>
                                    <th scope="col">Sl No.</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col">Sub-category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ url('sadf') }}" method="POST">
                                    @csrf
                                    @if ($subcategories->count() == !0)
                                    <div class="btn-group mb-2" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary" id="check_all_btn">Check All</button>
                                        <button type="button" class="btn btn-warning" id="uncheck_all_btn">Uncheck All</button>
                                        <button type="submit" class="btn btn-danger">Check Delete</button>
                                    </div>
                                    @endif
                                    
                                    @forelse ($subcategories as $subcategory)
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" class="delete_checkbox" name="subcategory_id[]" value="{{ $subcategory->id }}">
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ App\Models\Category::where('id', $subcategory->category_id)->first()->category_name }}</td>
                                            <td>{{ $subcategory->subcategory_name }}</td>
                                            <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    {{-- <a href="{{ url('category/edit') }}/{{ $category->id }}" type="button" class="btn btn-info">Edit</a>
                                                    <a href="{{ url('category/delete') }}/{{ $category->id }}" type="button" class="btn btn-danger">Delete</a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="60">No Data Availabele</td>
                                        </tr>                            
                                    @endforelse
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary h6">
                        Add New Sub Category
                    </div>
                    <div class="card-body">
                        @if (session('subcategory_added_status'))
                            <div class="alert alert-success">
                                {{ session('subcategory_added_status') }}
                            </div>
                        @endif
                        <form action="{{ route('subcategorypost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Category Name:</label>
                                <select class="form-control" name="category_id">
                                    <option value="">-- Select One --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub-Category Name:</label>
                                @if (session('category_added_status'))
                                    <div class="alert alert-success">
                                        {{ session('category_added_status') }}
                                    </div>
                                @endif
                                <input type="text" class="form-control" placeholder="sub-category name:" name="subcategory_name">
                                @error('subcategory_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mt-5">
                <div class="card text-white">
                    <div class="card-header text-white bg-secondary">
                        <div class="row">
                            <div class="col-lg-6 h5">
                                Deleted Sub-Category List:
                            </div>
                            <div class="col-lg-6 text-right">
                                {{-- @if ($deleted_categories->count() == !0)
                                    <a class="btn btn-success" type="button" href="{{ url('category/all/restore') }}">Restore All</a>
                                    <a id="force_delete_all_btn" class="btn btn-danger" type="button">Force Delete All</a>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- @if (session('category_delete_status'))
                            <div class="alert alert-success">
                                {{ session('category_delete_status') }}
                            </div>
                        @endif
                        
                        @if (session('category_edit_status'))
                            <div class="alert alert-success">
                                {{ session('category_edit_status') }}
                            </div>
                        @endif --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No.</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($deleted_categories as $deleted_category)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $deleted_category->category_name }}</td>
                                        <td>{{ $deleted_category->created_at->format('d/m/Y h:i:s A') }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ url('category/restore') }}/{{ $deleted_category->id }}" type="button" class="btn btn-success">Restore</a>
                                                <a href="{{ url('category/force/delete') }}/{{ $deleted_category->id }}" type="button" class="btn btn-danger">Force Delete</a>
                                            </div>
                                        </td>
                                    </tr> 
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="60">No Data Availabele</td>
                                    </tr>                            
                                @endforelse --}}
                            </tbody>
                        </table>
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
                $('.delete_checkbox').attr("checked", "checked");
            });

            $('#uncheck_all_btn').click(function (){
                $('.delete_checkbox').removeAttr("checked");
            });

        });
    </script>
@endsection








