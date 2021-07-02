<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tohoney Admin Dashboard</title>
    <!-- vendor css -->
    <link href="{{ asset('starlight_assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('starlight_assets/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('starlight_assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('starlight_assets/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <!-- Laravel Notify message! -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css" />
    <!-- Starlight CSS -->
    <link href="{{ asset('starlight_assets/css/starlight.css') }}" rel="stylesheet">
  </head>

  <body>
    {{-- class="collapsed-menu" --}}
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ url('/') }}"><i class="icon ion-android-star-outline"></i> <span class="text-info">MINI</span><span class="text-warning">~Shop</span> </a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">

        <a href="{{ route('home') }}" class="sl-menu-link @yield('dashboard')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline text-primary tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>
        <a href="" class="sl-menu-link @yield('')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline text-primary tx-22"></i>
            <span class="menu-item-label">My Orders</span>
          </div>
        </a>
        <a href="" class="sl-menu-link @yield('')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline text-primary tx-22"></i>
            <span class="menu-item-label">Manage Profile</span>
          </div>
        </a>
        <a href="" class="sl-menu-link @yield('')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline text-primary tx-22"></i>
            <span class="menu-item-label">My Wishlist</span>
          </div>
        </a>
        <a href="" class="sl-menu-link @yield('')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline text-primary tx-22"></i>
            <span class="menu-item-label">Mini~shop Vauchar</span>
          </div>
        </a>
        <a href="" class="sl-menu-link @yield('')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline text-primary tx-22"></i>
            <span class="menu-item-label">My review</span>
          </div>
        </a>
        <a href="" class="sl-menu-link @yield('')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline text-primary tx-22"></i>
            <span class="menu-item-label">Return & Cancellations</span>
          </div>
        </a>

        {{-- Admin Checking / dashboard  --}}
        @if (Auth::user()->role == 1)
          <a href="{{ route('category') }}" class="sl-menu-link @yield('category')">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-navicon-round text-primary tx-22"></i>
              <span class="menu-item-label">Category</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('subcategory') }}" class="sl-menu-link @yield('subcategory')">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-navicon-round text-primary tx-22"></i>
              <span class="menu-item-label">Sub Category</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('product') }}" class="sl-menu-link @yield('product')">
            <div class="sl-menu-item">
              <i class="fa fa-product-hunt text-primary tx-22"></i>
              <span class="menu-item-label">Products</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('coupon.index') }}" class="sl-menu-link @yield('coupon')">
            <div class="sl-menu-item">
              <i class="fa fa-product-hunt text-primary tx-22"></i>
              <span class="menu-item-label">Our Coupon</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('faq') }}" class="sl-menu-link @yield('faq')">
            <div class="sl-menu-item">
              <i class="fa fa-question text-primary tx-22" aria-hidden="true"></i>
              <span class="menu-item-label">FAQ Part</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('guestmsg') }}" class="sl-menu-link @yield('guestmsg')">
            <div class="sl-menu-item">
              <i class="fa fa-envelope-o text-primary tx-20"></i>
              <span class="menu-item-label">Guest Message</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('setting') }}" class="sl-menu-link @yield('setting')">
            <div class="sl-menu-item">
              <i class="fa fa-cog text-primary tx-22" aria-hidden="true"></i>
              <span class="menu-item-label"> Settings </span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
        @endif

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline text-primary tx-22"></i>
            <span class="menu-item-label">Pages</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
        </ul>
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ auth::user()->name }}</span>
              <img src="{{ asset('starlight_assets/img/img5.jpg') }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="icon ion-power"></i>
                        Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>

      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        @yield('breadcrumb')
        <div class="sl-pagebody">
          @yield('content')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @yield('footer_scripts')

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <script src="{{ asset('starlight_assets/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('starlight_assets/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('starlight_assets/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('starlight_assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('starlight_assets/js/starlight.js') }}"></script>
    <!-- Toastr script CDN -->
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Notify::message() !!}

  </body>
</html>




