@extends('layouts.starlight')

@section('title')
    Edit {{ $category_info->category_name }} Category
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('category') }}">Category</a>
        <span class="breadcrumb-item active">Edit Category</span>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary">
                        Edit Category Name
                    </div>
                    <div class="card-body">
                        <form action="{{ url('category/post/edit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name:</label>

                                <input type="hidden" value="{{ $category_info->id }}" name="category_id">
                                @if (session('category_added_status'))
                                    <div class="alert alert-success">
                                        {{ session('category_added_status') }}
                                    </div>
                                @endif
                                <input type="text" class="form-control" value="{{ $category_info->category_name }}" name="category_name">

                                @if ($errors->all())
                                    @foreach ($errors->all() as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
