@extends('layouts.starlight')

@section('title')
    Generall settings
@endsection
@section('setting')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Settings</span>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card text-dark">
                    <div class="card-header text-white bg-primary h6">
                        Generell Settings
                    </div>
                    <div class="card-body">
                        @if (session('setting_update_status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('setting_update_status') }}
                            </div>
                        @endif
                        <form action="{{ route('settingpost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number:</label>
                                <input type="number" class="form-control" value="{{ $settings->where('setting_name', 'phone')->first()->setting_value }}" name="phone">
                                {{-- @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'email')->first()->setting_value }}" name="email">
                                {{-- @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook Link:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'facebook_link')->first()->setting_value }}" name="facebook_link">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter Link:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'twitter_link')->first()->setting_value }}" name="twitter_link">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Instragram Link:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'insta_link')->first()->setting_value }}" name="insta_link">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Google plus Link:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'googleplus_link')->first()->setting_value }}" name="googleplus_link">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Address:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'address')->first()->setting_value }}" name="address">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Copy right Author:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'copyright')->first()->setting_value }}" name="copyright">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Others:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'phone_two')->first()->setting_value }}" name="phone_two">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Others:</label>
                                <input type="text" class="form-control" value="{{ $settings->where('setting_name', 'email_two')->first()->setting_value }}" name="email_two">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Footer short bio in our company:</label>
                                <textarea rows="4" cols="88" name="footer_short_description"> {{ $settings->where('setting_name', 'footer_short_description')->first()->setting_value }} </textarea>

                            </div>

                            <button type="submit" class="btn btn-primary">Save Now</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
