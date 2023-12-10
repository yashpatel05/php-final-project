@extends('layouts.app')

@section('title', 'Feedback')

@section('content')
@if(session()->has('success') && !empty(session('success')))
<script>
    // JavaScript for displaying the alert
    window.onload = function() {
        alert("{{ session('success') }}");
    };
</script>
@endif
<!-- off-canvas menu start -->
<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>

        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box-offcanvas">
                <form>
                    <input type="text" placeholder="Search Here...">
                    <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>
            <!-- search box end -->

            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="index.php">Home</a>
                        </li>
                        <li class="menu-item-has-children"><a href="#">pages</a>
                            <ul class="megamenu dropdown">
                                <li class="mega-title menu-item-has-children"><a href="#">column 01</a>
                                    <ul class="dropdown">
                                        <li><a href="#shop.html">shop grid left
                                                sidebar</a></li>
                                        <li><a href="#shop-grid-right-sidebar.html">shop grid right
                                                sidebar</a></li>
                                        <li><a href="#shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                        <li><a href="#shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="mega-title menu-item-has-children"><a href="#">column 02</a>
                                    <ul class="dropdown">
                                        <li><a href="#product-details.html">product details</a></li>
                                        <li><a href="#product-details-affiliate.html">product details affiliate</a></li>
                                        <li><a href="#product-details-variable.html">product details variable</a></li>
                                        <li><a href="#product-details-group.html">product details group</a></li>
                                    </ul>
                                </li>
                                <li class="mega-title menu-item-has-children"><a href="#">column 03</a>
                                    <ul class="dropdown">
                                        <li><a href="#cart.html">cart</a></li>
                                        <li><a href="#checkout.html">checkout</a></li>
                                        <li><a href="#compare.html">compare</a></li>
                                        <li><a href="#wishlist.html">wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="mega-title menu-item-has-children"><a href="#">column 04</a>
                                    <ul class="dropdown">
                                        <li><a href="#my-account.html">my-account</a></li>
                                        <li><a href="#login-register.html">login-register</a></li>
                                        <li><a href="#contact-us.html">contact us</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children "><a href="#">shop</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><a href="#">shop grid layout</a>
                                    <ul class="dropdown">
                                        <li><a href="#shop.html">shop grid left sidebar</a></li>
                                        <li><a href="#shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                        <li><a href="#shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                        <li><a href="#shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">shop list layout</a>
                                    <ul class="dropdown">
                                        <li><a href="#shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                        <li><a href="#shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                        <li><a href="#shop-list-full-width.html">shop list full width</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">products details</a>
                                    <ul class="dropdown">
                                        <li><a href="#product-details.html">product details</a></li>
                                        <li><a href="#product-details-affiliate.html">product details affiliate</a></li>
                                        <li><a href="#product-details-variable.html">product details variable</a></li>
                                        <li><a href="#product-details-group.html">product details group</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children "><a href="#">Blog</a>
                            <ul class="dropdown">
                                <li><a href="#blog-left-sidebar.html">blog left sidebar</a></li>
                                <li><a href="#blog-right-sidebar.html">blog right sidebar</a></li>
                                <li><a href="#blog-grid-full-width.html">blog grid no sidebar</a></li>
                                <li><a href="#blog-details.html">blog details</a></li>
                                <li><a href="#blog-details-audio.html">blog details audio</a></li>
                                <li><a href="#blog-details-video.html">blog details video</a></li>
                                <li><a href="#blog-details-left-sidebar.html">blog details left sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="#contact-us.html">Contact us</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->

            <!-- user setting option start -->
            <div class="mobile-settings">
                <ul class="nav">
                    <li>
                        <div class="dropdown mobile-top-dropdown">
                            <a href="#" class="dropdown-toggle" id="currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Currency
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="currency">
                                <a class="dropdown-item" href="#">$ CAD</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown mobile-top-dropdown">
                            <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="myaccount">
                                <a class="dropdown-item" href="{{ route('myaccount') }}">my account</a>
                                <a class="dropdown-item" href="{{ route('login') }}"> login</a>
                                <a class="dropdown-item" href="{{ route('register') }}">register</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- user setting option end -->

            <!-- offcanvas widget area start -->
            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <ul>
                        <li><i class="fa fa-mobile"></i>
                            <a href="#">365-366-5932</a>
                        </li>
                        <li><i class="fa fa-envelope-o"></i>
                            <a href="#">team404@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="off-canvas-social-widget">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                </div>
            </div>
            <!-- offcanvas widget area end -->
        </div>
    </div>
</aside>
<!-- off-canvas menu end -->

<!-- main wrapper start -->
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">Feedback</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('feedback') }}">Feedback</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- shop main wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- Add new feedback button start -->
                        @php
                        $userId = session('user_id');
                        @endphp

                        @if($userId)
                        <div class="mb-3">
                            <a href="{{ route('feedback.create') }}" class="btn btn-primary">Add Feedback</a>
                        </div>
                        @endif
                        <!-- Add new feedback button end -->

                        <!-- product item list start -->
                        <div class="shop-product-wrap list-view row mbn-50">
                            <div class="col-lg-4 col-sm-6">
                                <!-- product grid item start -->
                                <div class="product-item mb-53">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-1.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- product grid item end -->

                                <!-- product list item start -->
                                <div class="shop-product-wrap list-view row mbn-50">
                                    @foreach($feedbacks as $feedback)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-list-item mb-30">
                                            <div class="product-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/img/product/' . $feedback->product->image) }}" height="100" width="100" alt="product thumb">
                                                </a>
                                            </div>
                                            <div class="product-content-list">
                                                <h5 class="product-name">
                                                    <a href="product-details.html">{{ $feedback->product->name }}</a>
                                                </h5>
                                                <div class="price-box">
                                                    <span class="price-regular">{{ $feedback->user->name }}</span>
                                                    <span class="price-old">{{ $feedback->product->price }}</span>
                                                </div>
                                                <p>{{ $feedback->feedback }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="custom-pagination">
                                        @if($feedbacks->lastPage() > 1)
                                        <ul class="pagination">
                                            @if($feedbacks->currentPage() != 1)
                                            <li class="page-item"><a class="page-link" href="{{ $feedbacks->url($feedbacks->currentPage() - 1) }}">Previous</a></li>
                                            @endif

                                            @for($i = 1; $i <= $feedbacks->lastPage(); $i++)
                                                <li class="page-item {{ ($feedbacks->currentPage() == $i) ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ $feedbacks->url($i) }}">{{ $i }}</a>
                                                </li>
                                                @endfor

                                                @if($feedbacks->currentPage() != $feedbacks->lastPage())
                                                <li class="page-item"><a class="page-link" href="{{ $feedbacks->url($feedbacks->currentPage() + 1) }}">Next</a></li>
                                                @endif
                                        </ul>
                                        @endif
                                    </div>


                                </div>

                                <!-- end pagination area -->
                            </div>
                        </div>
                        <!-- shop main wrapper end -->
                    </div>
                </div>
            </div>
            <!-- page main wrapper end -->
</main>
<!-- main wrapper end -->

<!-- Quick view modal start -->
<div class="modal" id="quick_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- product details inner end -->

            </div>
        </div>
        <!-- Quick view modal end -->

        <!-- offcanvas search form start -->
        <div class="offcanvas-search-wrapper">
            <div class="offcanvas-search-inner">
                <div class="offcanvas-close">
                    <i class="ion-android-close"></i>
                </div>
                <div class="container">
                    <div class="offcanvas-search-box">
                        <form class="d-flex bdr-bottom w-100">
                            <input type="text" placeholder="Search entire storage here...">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i>search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection