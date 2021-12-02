@extends('layouts.starlight')
@section('title')
    User List
@endsection
@section('userlist')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">User List</span>
    </nav>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Auth::user()->role == 1)
                <div class="row mt-4 mb-4">
                    <div class="col-md-4 text-white" style="background-color: #c3c8cf; border: 1px solid #c3c8cf; box-shadow: 1px 1px 1px 1px">
                        Total Users
                    </div>

                    <div class="col-md-4 text-white" style="background-color: #c3c8cf; border: 1px solid #c3c8cf; box-shadow: 1px 1px 1px 1px">
                        Last Month users
                    </div>

                    <div class="col-md-4 text-white" style="background-color: #c3c8cf; border: 1px solid #c3c8cf; box-shadow: 1px 1px 1px 1px">
                        Today Users
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <form action="{{ url('send/sms') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h6>Send SMS Your Customer</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-control">
                                <label class="h6 mt-2" for="">Select Number</label>
                                <input name="numbers" class="form-control" type="text" value="">
                            </div>
    
                            <div class="form-control">
                                <label class="h6 mt-2" for="">Type Message</label>
                                <textarea name="message" rows="5" class="form-control"></textarea>
                            </div>
                            <button class="mt-2 btn btn-info">Send Msg</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="alert alert-success text-center">
                                Total Users: {{ $users->count() }}
                            </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Serial No.</th></th>
                                    <th scope="col">Name</th></th>
                                    <th scope="col">Email Address</th></th>
                                    <th scope="col">Joined In</th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ Str::title($user->name) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
            @else
                @include('customer.dashboard')
            @endif
        </div>
    </div>
</div>
@endsection


