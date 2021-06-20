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
        <a class="breadcrumb-item" href="{{ url('coupon') }}">Coupon</a>
        <span class="breadcrumb-item active">Eidt coupon</span>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary h5">
                        Coupon Edit
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Name:</label>
                                <input type="text" class="form-control" value="{{ $coupon->coupon_name }}" placeholder="Coupon Name:" name="coupon_name">
                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="exampleInputEmail1">Discount Amount:</label>
                                <input type="text" class="form-control" value="{{ $coupon->coupon_discount }}" placeholder="Discount Amount:" name="coupon_discount">
                                @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="exampleInputEmail1">Uses Limit:</label>
                                <input type="text" class="form-control" value="{{ $coupon->uses_limit }}" placeholder="Uses Limit:" name="uses_limit">
                                
                                <label for="exampleInputEmail1">Experied Date:</label>
                                <input type="date" class="form-control" value="{{ $coupon->expire_date }}" placeholder="Experied date:" name="expire_date">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
