@extends('layouts.starlight')

@section('title')
    Guest message
@endsection
@section('guestmsg')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Guest Message</span>
    </nav>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Guest Message') }}</div>

                <div class="card-body">

                        <div class="alert alert-success text-center">
                            Receved Message: {{ $guest_msg->count() }}
                        </div>
                    <table class="table table-bordered">
                        @if (session('guest_msg_status'))
                            <div class="alert alert-danger">
                                {{ session('guest_msg_status') }}
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th scope="col">SI No.</th></th>
                                <th scope="col">Guest Name</th></th>
                                <th scope="col">Guest Email</th></th>
                                <th scope="col">Subject</th></th>
                                <th scope="col">Querstion</th></th>
                                <th scope="col">Sending Time</th></th>
                                <th scope="col">Action</th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guest_msg as $msg)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $msg->fast_name }}</td>
                                    <td>{{ $msg->email }}</td>
                                    <td>{{ $msg->subject }}</td>
                                    <td>{{ $msg->message }}</td>
                                    <td>{{ $msg->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-outline-info mt-1" href="#"><i class="fa fa-paper-plane-o"></i></a>
                                        <a class="btn btn-sm btn-outline-danger mt-1" href="{{ url('guestmsg/delete') }}/{{ $msg->id }}"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- {{ $users->links() }} --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection