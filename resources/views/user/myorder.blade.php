@extends('layouts.app')

@section('title', 'My Orders')

@section('content')


<!-- off-canvas menu start -->
<!-- user setting option end -->

<!-- offcanvas widget area start -->


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
                            <h1 class="breadcrumb-title">My Orders</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('myorder') }}">My Orders</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Thumbnail</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($order_details as $order_detail)
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href=""><img src="{{ asset('assets/img/product/' . $order_detail->product->image) }}" alt="Product"></a>
                                        </td>
                                        <td class="pro-title"><a href="#">{{ $order_detail->product->name }}</a></td>
                                        <td class="pro-price"><span>CAD {{ $order_detail->product->price }}</span></td>
                                        <td><span>{{ $order_detail->quantity }}</span></td>
                                        <td class="pro-price"><span>CAD {{ $order_detail->total_amount }}</span></td>
                                        <!--<td class="pro-subtotal"><span></span></td>-->
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->


                        <!-- cart main wrapper end -->
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