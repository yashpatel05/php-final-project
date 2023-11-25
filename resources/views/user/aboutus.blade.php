@extends('layouts.app')

@section('title', 'About US')

@section('content')

<main>
    <div class="breadcrumb-area bg-img" data-bg="{{ asset('assets/img/banner/breadcrumb-banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">About Us</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('aboutus') }}">About Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2">
                    <div class="blog-widget-wrapper">
                        <!-- widget item start -->

                        <!-- widget item end -->



                    </div>
                </div>
                <div class="col-lg-12 order-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-post-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('assets/img/blog/blog-details-1.jpg') }}" alt="blog thumb">
                                </div>
                                <div class="blog-content blog-details">
                                    <h5 class="blog-title">
                                        Welcome to The Shoe Company - Your Ultimate Destination for Stylish Footwear
                                    </h5>
                                    <ul class="blog-meta">
                                        <li><span>By: </span>Team 404,</li>
                                        <li><span>On: </span>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</li>
                                    </ul>
                                    <p>
                                        At The Shoe Company, we're passionate about providing you with the latest and trendiest footwear
                                        options. Our goal is to offer a seamless online shopping experience, combining style, comfort,
                                        and quality in every step you take.
                                    </p>
                                    <blockquote>
                                        <p>
                                            Shoes aren't just a necessity; they are a statement of style. Whether you're looking for
                                            casual sneakers, elegant heels, or durable sports shoes, we have a wide range to suit every
                                            occasion and preference.
                                        </p>
                                    </blockquote>
                                    <p>
                                        Our journey began with the vision to create a platform where shoe enthusiasts can explore a
                                        diverse collection, from timeless classics to the latest fashion-forward designs. We understand
                                        that shoes play a crucial role in expressing your personality, and that's why we curate a selection
                                        that caters to various tastes and preferences.
                                    </p>
                                    <p>
                                        Step into the world of The Shoe Company and discover footwear that not only complements your
                                        style but also enhances your confidence. Whether you're stepping into the office, hitting the gym,
                                        or attending a special event, we have the perfect pair for you.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog main wrapper end -->
</main>
<!-- main wrapper end -->


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
<!-- offcanvas search form end -->

<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="ion-android-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-1.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Flowers bouquet pink for all flower lovers</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$100.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="ion-android-close"></i></button>
                        </li>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-2.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Jasmine flowers white for all flower lovers</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$80.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="ion-android-close"></i></button>
                        </li>
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong>$300.00</strong></span>
                        </li>
                        <li>
                            <span>Eco Tax (-2.00)</span>
                            <span><strong>$10.00</strong></span>
                        </li>
                        <li>
                            <span>VAT (20%)</span>
                            <span><strong>$60.00</strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>$370.00</strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="cart.html"><i class="fa fa-shopping-cart"></i> view cart</a>
                    <a href="cart.html"><i class="fa fa-share"></i> checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->
@endsection