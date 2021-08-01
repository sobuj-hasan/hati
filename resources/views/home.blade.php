@extends('layouts.starlight')
@section('title')
    Dashboard
@endsection
@section('dashboard')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Auth::user()->role == 1)

                <div class="row row-sm">
                    <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ 850</h3>
                        </div><!-- card-body -->
                        <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                            <span class="tx-11 tx-white-6">Gross Sales</span>
                            <h6 class="tx-white mg-b-0">৳ 2,210</h6>
                            </div>
                            <div>
                            <span class="tx-11 tx-white-6">Tax Return</span>
                            <h6 class="tx-white mg-b-0">৳ 320</h6>
                            </div>
                        </div><!-- -->
                        </div><!-- card -->
                    </div><!-- col-3 -->
                    <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                        <div class="card pd-20 bg-info">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ 4,625</h3>
                        </div><!-- card-body -->
                        <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                            <span class="tx-11 tx-white-6">Gross Sales</span>
                            <h6 class="tx-white mg-b-0">৳ 2,210</h6>
                            </div>
                            <div>
                            <span class="tx-11 tx-white-6">Tax Return</span>
                            <h6 class="tx-white mg-b-0">৳ 320</h6>
                            </div>
                        </div><!-- -->
                        </div><!-- card -->
                    </div><!-- col-3 -->
                    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                        <div class="card pd-20 bg-purple">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ 11,908</h3>
                        </div><!-- card-body -->
                        <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                            <span class="tx-11 tx-white-6">Gross Sales</span>
                            <h6 class="tx-white mg-b-0">৳ 2,210</h6>
                            </div>
                            <div>
                            <span class="tx-11 tx-white-6">Tax Return</span>
                            <h6 class="tx-white mg-b-0">৳ 320</h6>
                            </div>
                        </div><!-- -->
                        </div><!-- card -->
                    </div><!-- col-3 -->
                    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                        <div class="card pd-20 bg-sl-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ 91,239</h3>
                        </div><!-- card-body -->
                        <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                            <div>
                            <span class="tx-11 tx-white-6">Gross Sales</span>
                            <h6 class="tx-white mg-b-0">৳ 2,210</h6>
                            </div>
                            <div>
                            <span class="tx-11 tx-white-6">Tax Return</span>
                            <h6 class="tx-white mg-b-0">৳ 320</h6>
                            </div>
                        </div><!-- -->
                    </div><!-- card -->
                    </div><!-- col-3 -->
                </div><!-- row -->

                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('Total Orders') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="alert alert-success text-center">
                                Total Orders: {{ $users->count() }}
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

@section('footer_scripts')
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'Julay',
            'August',
            'September',
            'Octber',
            'Novembar',
            'December',
            ];
            const data = {
            labels: labels,
            datasets: [{
                label: 'Sell',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [12, 10, 5, 2, 20, 30, 45, 67, 43, 21, 80],
            }]
        };

        const config = {
            type: 'bar',
            data,
            options: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection

