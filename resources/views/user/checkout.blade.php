@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<!-- Main wrapper start -->
<main>
    <!-- Breadcrumb area start -->
    <div class="breadcrumb-area bg-img" data-bg="{{ asset('assets/img/banner/breadcrumb-banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">Checkout</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area end -->

    <!-- Checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Order Summary Details -->
                    <div class="order-summary-details">
                        <h4 class="checkout-title">Your Order Summary</h4>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $subtotal = 0;
                                        @endphp
                                        @foreach($cartItems as $cartItem)
                                        <tr>
                                            <td>{{ $cartItem->product->name }}</td>
                                            <td>CAD ${{ $cartItem->price }} x {{ $cartItem->quantity }}</td>
                                            @php
                                            $subtotal += $cartItem->product->price * $cartItem->quantity;
                                            @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td><strong>Rs. {{ $subtotal }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Order Payment Method -->
                            <div class="order-payment-method">
                                <!-- Display Payment Information Here -->
                                <div class="single-payment-method show">
                                    <!-- Choose the payment method based on your logic -->
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="creditCard" name="paymentmethod" value="creditCard" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="creditCard">Credit Card</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="creditCard">
                                        <!-- Add a form to collect credit card details -->
                                        <div class="container" style="max-width: 400px;">
                                            <form method="post" action="{{ route('placeorder') }}">
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
                                                <input type="hidden" name="sub_total" value="{{ $subtotal }}">

                                                <div class="form-group mb-3">
                                                    <label for="cardNumber">Card Number</label>
                                                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="{{ old('cardNumber') }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="expiryDate">Expiry Date</label>
                                                    <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" value="{{ old('expiryDate') }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="cvv">CVV</label>
                                                    <input type="text" class="form-control" id="cvv" name="cvv" value="{{ old('cvv') }}">
                                                </div>


                                                <button type="submit" class="btn btn-sqr">Place Order</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Display Payment Information -->
                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" class="custom-control-input" id="terms" required />
                                        <label class="custom-control-label" for="terms">I have read and agree to the website <a href="index.html">terms and conditions.</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
</main>
<!-- main wrapper end -->
@endsection