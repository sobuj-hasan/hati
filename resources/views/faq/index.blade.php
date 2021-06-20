@extends('layouts.starlight')

@section('title')
    FAQ Part
@endsection
@section('faq')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">FAQ</span>
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
                                Faq List : 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('faq_delete_status'))
                            <div class="alert alert-danger">
                                {{ session('faq_delete_status') }}
                            </div>
                        @endif

                        {{-- @if (session('category_edit_status'))
                            <div class="alert alert-success">
                                {{ session('category_edit_status') }}
                            </div>
                        @endif --}}

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">FAQ ID </th>
                                    <th scope="col">FAQ Querstion</th>
                                    <th scope="col">FAQ Answer</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faq_details as $faq)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $faq->faq_querstion }}</td>
                                        <td>{{ $faq->faq_answer }}</td>
                                        <td>{{ $faq->created_at }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info mt-2" type="submit" href="#">Edit</a>
                                            <a class="btn btn-sm btn-danger mt-2" type="submit" href="{{ url('faq/delete') }}/{{ $faq->id }}">Delete</a>
                                        </td>
                                    </tr> 
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="60">No Data Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary h6"> 
                        Add New FAQ
                    </div>
                    <div class="card-body">
                        <form action="{{ url('faq/post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Querstion: </label>
                                @if (session('faq_add_status'))
                                    <div class="alert alert-success">
                                        {{ session('faq_add_status') }}
                                    </div>
                                @endif
                                <input type="text" class="form-control" placeholder="write your faq querstion:" name="faq_querstion">
                                @error('faq_querstion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Answer: </label>
                                <input type="text" class="form-control" placeholder="write your faq answer:" name="faq_answer">
                                @error('faq_answer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('footer_scripts')
    {{-- <script>
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
    </script> --}}
@endsection

