@extends('layouts.app')

@section('title', 'The Shoe Company - Home')

@section('content')
@if(session()->has('success') && !empty(session('success')))
<script>
    // JavaScript for displaying the alert
    window.onload = function() {
        alert("{{ session('success') }}");
    };
</script>
@endif
<!-- main wrapper start -->
<main>
    <!-- hero slider section start -->
    <section class="hero-slider">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                        <!-- single slider item start -->
                        <div class="hero-single-slide">
                            <div class="hero-slider-item bg-img" data-bg="assets/img/banner/banner-2.jpg">
                                <div class="hero-slider-content slide-1">
                                    <h5 class="slide-subtitle">Top Selling!</h5>
                                    <h2 class="slide-title">New Collection</h2>
                                    <p class="slide-desc">Wide range of Shoes. Choose from heels, loafers, floaters, sports shoes & more. Buy now! Best Deals. </p>
                                    <a href="#" class="btn btn-hero">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <!-- single slider item end -->

                        <!-- single slider item start -->
                        <div class="hero-single-slide">
                            <div class="hero-slider-item bg-img" data-bg="assets/img/banner/banner-4.jpg">
                                <div class="hero-slider-content slide-1">
                                    <h5 class="slide-subtitle">Best Selling!</h5>
                                    <h2 class="slide-title">Top Collection</h2>
                                    <p class="slide-desc">Wide range of Shoes. Choose from heels, loafers, floaters, sports shoes & more. Buy now! Best Deals. </p>
                                    <a href="#" class="btn btn-hero">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <!-- single slider item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero slider section end -->

    <!-- banner statistic area start -->
    <div class="banner-statistics mt-30">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-md-6">
                    <div class="img-container mt-30">
                        <a href="#product-details.html">
                            <img src="assets/img/banner/banner-1.jpg" alt="banner-image">
                        </a>
                        <div class="banner-text">
                            <h5 class="banner-subtitle">sports shoes</h5>
                            <h3 class="banner-title">20% Off<br>For Sports women</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container mt-30">
                        <a href="#product-details.html">
                            <img src="assets/img/banner/banner-2.jpg" alt="banner-image">
                        </a>
                        <div class="banner-text">
                            <h5 class="banner-subtitle">sports shoes</h5>
                            <h3 class="banner-title">20% Off<br>For Sports men</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistic area end -->

    <!-- our product area start -->
    <section class="our-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">Our Product</h2>
                        <p class="sub-title">We manufacture and supply a top-quality series of footwear, including Casual Shoes, Women's Sports Shoes, Canvas Shoes, Men's Ankle Boots, and Men's Sandals.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 mbn-50 slick-row-15 slick-arrow-style">
                        <!-- product single item start -->
                        @foreach($products as $product)
                        <div class="product-item mb-50">
                            <div class="product-thumb">
                                <a href="#">
                                    <img height="200" src="{{ asset('assets/img/product/' . $product->image) }}" alt="">
                                </a>
                                <div class="product-content">
                                    <h5 class="product-name">{{ $product->name }}</h5>
                                    <div class="price-box mb-1">
                                        <span class="price-regular">CAD {{ $product->price }}</span>
                                    </div>
                                    @if($product->quantity > 0)
                                    <div style="text-align: center; margin-bottom: 1em;">
                                        <form action="{{ route('cart.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="product_price" value="{{ $product->price }}">
                                            <div class="quantity-input mb-2">
                                                <label for="quantity">Qty:</label>
                                                <input type="number" name="quantity" value="1" min="1" style="width: 40px;">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                                        </form>
                                        <br> <!-- Line break for spacing -->
                                        <form action="{{ route('wishlist.add') }}" method="post">
                                            @csrf
                                            <!-- Display validation errors -->
                                            @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-heart"></i> Wishlist</button>
                                        </form>
                                    </div>
                                    @else
                                    <p class="out-of-stock-message" style="color: red; font-size: 18px; margin-top: 80px;">Out of Stock</p>
                                    <form action="{{ route('wishlist.add') }}" method="post">
                                        @csrf
                                        <!-- Display validation errors -->
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;"><i class="fa fa-heart"></i> Wishlist</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our product area end -->

    <!-- testimonial section start -->
    <section class="testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-inner bg-img" data-bg="assets/img/banner/banner-bg.jpg">
                        <h2 class="testimonial-title">Client Say</h2>
                        <div class="testimonial-active slick-dot-style slick-dot-style__style-2">
                            <!-- testimonial item start -->
                            @foreach($feedbacks as $feedback)
                            <div class="slider-item">
                                <div class="testimonial-item">
                                    <div class="testimonial-thumb">
                                        <img src="{{ asset('assets/img/banner/user.png') }}" alt="client thumb">
                                    </div>
                                    <div class="testimonial-content">
                                        <h5 class="client">{{ $feedback->user->name }}</h5>
                                        <p>{{ $feedback->feedback }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->


    <!-- top seller area start -->
    <section class="top-seller-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">top seller</h2>
                        <p class="sub-title">Wide range of Shoes for Men. Choose from loafers, floaters, sports shoes & more.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="product-banner">
                        <a href="#">
                            <img src="assets/img/banner/banner-3.jpg" alt="product banner">
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                    <div class="top-seller-carousel slick-row-15 mtn-30">
                        <!-- product item start -->
                        <div class="slide-item">
                            <div class="pro-item-small mt-30">
                                <div class="product-thumb">
                                    <a href="#product-details.html">
                                        <img src="assets/img/product/pro-small-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="pro-small-content">
                                    <h6 class="product-name">
                                        <a href="#product-details.html">Simple Fabric Shoe</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">CAD 80</span>
                                        <span class="price-old"><del>CAD 100</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product item start -->

                        <!-- product item start -->
                        <div class="slide-item">
                            <div class="pro-item-small mt-30">
                                <div class="product-thumb">
                                    <a href="#product-details.html">
                                        <img src="assets/img/product/pro-small-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="pro-small-content">
                                    <h6 class="product-name">
                                        <a href="#product-details.html">exclusive mens shoe</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">CAD 75</span>
                                        <span class="price-old"><del>CAD 85</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product item start -->

                        <!-- product item start -->
                        <div class="slide-item">
                            <div class="pro-item-small mt-30">
                                <div class="product-thumb">
                                    <a href="#product-details.html">
                                        <img src="assets/img/product/pro-small-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="pro-small-content">
                                    <h6 class="product-name">
                                        <a href="#product-details.html">Quickiin Mens shoes</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">CAD 105</span>
                                        <span class="price-old"><del>CAD 120</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product item start -->

                        <!-- product item start -->
                        <div class="slide-item">
                            <div class="pro-item-small mt-30">
                                <div class="product-thumb">
                                    <a href="#product-details.html">
                                        <img src="assets/img/product/pro-small-4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="pro-small-content">
                                    <h6 class="product-name">
                                        <a href="#product-details.html">Primitive Men shoes</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">CAD 90</span>
                                        <span class="price-old"><del>CAD 110</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product item start -->

                        <!-- product item start -->
                        <div class="slide-item">
                            <div class="pro-item-small mt-30">
                                <div class="product-thumb">
                                    <a href="#product-details.html">
                                        <img src="assets/img/product/pro-small-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="pro-small-content">
                                    <h6 class="product-name">
                                        <a href="#product-details.html">Sports Mens shoes</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">CAD 60</span>
                                        <span class="price-old"><del>CAD 75</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product item start -->

                        <!-- product item start -->
                        <div class="slide-item">
                            <div class="pro-item-small mt-30">
                                <div class="product-thumb">
                                    <a href="#product-details.html">
                                        <img src="assets/img/product/pro-small-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="pro-small-content">
                                    <h6 class="product-name">
                                        <a href="#product-details.html">Quickiin Mens shoes</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">CAD 80.00</span>
                                        <span class="price-old"><del>CAD 70.00</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product item start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top seller area end -->



    <!-- service features start -->
    <section class="service-policy-area section-padding">
        <div class="container">
            <div class="row mtn-30">
                <!-- single policy item start -->
                <div class="col-lg-4">
                    <div class="service-policy-item mt-30 bg-1">
                        <div class="policy-icon">
                            <img src="assets/img/icon/policy-1.png" alt="policy icon">
                        </div>
                        <div class="policy-content">
                            <h5 class="policy-title">FREE SHIPPING</h5>
                            <p class="policy-desc">Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <!-- single policy item start -->

                <!-- single policy item start -->
                <div class="col-lg-4">
                    <div class="service-policy-item mt-30 bg-2">
                        <div class="policy-icon">
                            <img src="assets/img/icon/policy-2.png" alt="policy icon">
                        </div>
                        <div class="policy-content">
                            <h5 class="policy-title">ONLINE SUPPORT</h5>
                            <p class="policy-desc">Online support 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <!-- single policy item start -->

                <!-- single policy item start -->
                <div class="col-lg-4">
                    <div class="service-policy-item mt-30 bg-3">
                        <div class="policy-icon">
                            <img src="assets/img/icon/policy-3.png" alt="policy icon">
                        </div>
                        <div class="policy-content">
                            <h5 class="policy-title">MONEY RETURN</h5>
                            <p class="policy-desc">Back guarantee under 5 days</p>
                        </div>
                    </div>
                </div>
                <!-- single policy item start -->
            </div>
        </div>
    </section>
    <!-- service features end -->
</main>
<!-- main wrapper end -->
@endsection