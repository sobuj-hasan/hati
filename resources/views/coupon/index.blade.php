@extends('layouts.starlight')

@section('title')
    Coupon 
@endsection
@section('coupon')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Coupon</span>
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
                                Our Coupon List:
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('coupon_delete'))
                            <div class="alert alert-danger">
                                {{ session('coupon_delete') }}
                            </div>
                        @endif
                        @if (session('coupon_update_status'))
                            <div class="alert alert-success">
                                {{ session('coupon_update_status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No.</th>
                                    <th scope="col">Coupon Name</th>
                                    <th scope="col">Coupon Discount</th>
                                    <th scope="col">User Limit</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ $coupon->coupon_discount }}</td>
                                        <td>{{ $coupon->uses_limit }}</td>
                                        <td>{{ $coupon->created_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info" href="{{ route('coupon.edit', $coupon->id) }}">Edit</a>
                                            <form action="{{ route('coupon.destroy', $coupon->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mt-1">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="60">
                                            No Coupon Abailavle !
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary h5">
                        Add New Coupon
                    </div>
                    <div class="card-body">
                        @if (session('coupon_add_status'))
                            <div class="alert alert-success">
                                {{ session('coupon_add_status') }}
                            </div>
                        @endif
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Name:</label>
                                {{-- @if (session('category_added_status'))
                                    <div class="alert alert-success">
                                        {{ session('category_added_status') }}
                                    </div>
                                @endif --}}
                                <input type="text" class="form-control" placeholder="Coupon Name:" name="coupon_name">
                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="exampleInputEmail1">Discount Amount:</label>
                                <input type="text" class="form-control" placeholder="Discount Amount:" name="coupon_discount">
                                @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="exampleInputEmail1">Uses Limit:</label>
                                <input type="text" class="form-control" placeholder="Uses Limit:" name="uses_limit">
                                
                                <label for="exampleInputEmail1">Experied Date:</label>
                                <input type="date" class="form-control" placeholder="Experied date:" name="expire_date">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
