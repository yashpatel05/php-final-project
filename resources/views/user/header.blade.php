<!-- main header start -->
<div class="main-header d-none d-lg-block">
    <!-- header top start -->
    <div class="header-top theme-bg">
        <div>
            <div class="welcome-message" style="text-align:center;">
                <p>Welcome to The Shoe Company online store</p>
            </div>
        </div>
    </div>
    <!-- header top end -->

    <!-- header middle area start -->
    <div class="header-main-area sticky">
        <div class="container">
            <div class="row align-items-center position-relative">
                <!-- start logo area -->
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo/theshoecompany.png') }}" alt="brand logo" style="height:115px; width:115px; max-width: 100%;">
                        </a>
                    </div>
                </div>
                <!-- start logo area -->

                <!-- main menu area start -->
                <div class="col-lg-8 position-static">
                    <div class="main-menu-area">
                        <div class="main-menu">
                            <!-- main menu navbar start -->
                            <nav class="desktop-menu">
                                <ul>
                                    <li class="active"><a href="{{ url('home') }}">Home</a></li>
                                    <li class="static"><a href="#">Category <i class="fa fa-angle-down"></i></a>
                                        <ul class="megamenu dropdown">
                                            @foreach($categories as $category)
                                            <li class="mega-title">
                                                <a href="#">{{ $category->name }}</a>
                                                <ul>
                                                    @foreach($category->subcategories as $subCategory)
                                                    <li><a href="{{ url("products?id=$subCategory->id") }}">{{ $subCategory->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="#">Feedback</a></li>
                                    <li><a href="{{ route('contactus') }}">Contact us</a></li>
                                    @if (session()->has('user_id'))
                                    <li><a href="#">My order</a></li>
                                    @endif
                                    <li><a href="{{ route('aboutus') }}">About Us</a></li>
                                </ul>
                            </nav>
                            <!-- main menu navbar end -->
                        </div>
                    </div>
                </div>
                <!-- main menu area end -->

                <!-- mini cart area start -->
                <div class="col-lg-2">
                    <div class="header-configure-wrapper">
                        <div class="header-configure-area">
                            <ul class="nav justify-content-end">
                                <li>
                                    <a href="#" class="offcanvas-btn">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </li>

                                <li class="user-hover">
                                    <a href="#">
                                        <i class="ion-ios-gear-outline"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        @if (session()->has('user_id'))
                                        <!-- Code for authenticated user -->
                                        <li><a href="#">My account</a></li>
                                        <li><a href="{{ route('logout') }}">Logout</a></li>
                                        @else
                                        <!-- Code for non-authenticated user -->
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="minicart-btn">
                                        <i class="ion-bag"></i>
                                        <div class="notification">
                                            {{-- <?php echo $cart_count; ?> --}}
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- mini cart area end -->
            </div>
        </div>
    </div>
    <!-- header middle area end -->
</div>
<!-- main header start -->

<!-- mobile header start -->
<div class="mobile-header d-lg-none d-md-block sticky">
    <!--mobile header top start -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="mobile-main-header">
                    <div class="mobile-logo">
                        <a href="{{ url('home') }}">
                            <img src="{{ asset('assets/img/logo/theshoecompany.png') }}" alt="Brand Logo" style="height:58px; width:58px;">
                        </a>
                    </div>
                    <div class="mobile-menu-toggler">
                        <div class="mini-cart-wrap">
                            <a href="{{ url('#cart.html') }}">
                                <i class="ion-bag"></i>
                            </a>
                        </div>
                        <div class="mobile-menu-btn">
                            <div class="off-canvas-btn">
                                <i class="ion-navicon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile header top start -->
</div>
<!-- mobile header end -->