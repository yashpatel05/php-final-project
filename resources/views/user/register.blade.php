<!DOCTYPE html>

<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>@yield('title')</title>
    <!-- All Plugins CSS -->
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <!-- All Vendor CSS -->
    <link href="{{ asset('assets/css/vendor.css') }}" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <style>
        body {
            background-color: #F0E68C;
        }
    </style>
</head>

<body>
    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">Register</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->



        <!-- Register Content Start -->
        <center>
            <div class="col-lg-6">
                <div class="login-reg-form-wrap signup-form">
                    <h2>Signup Form</h2>
                    <form method="post" action="{{ url('/register') }}">
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
                        <div class="single-input-item">
                            <input type="text" name="name" placeholder="User name" value="{{ old('name') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="text" name="contact_no" placeholder="Contact-no" value="{{ old('contact_no') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="password" name="password" placeholder="Enter your Password" required />
                        </div>

                        <div class="single-input-item">
                            <input type="text" name="street_address" placeholder="Street Address" value="{{ old('street_address') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="text" name="city" placeholder="City" value="{{ old('city') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="text" name="state" placeholder="State" value="{{ old('state') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="text" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="text" name="country" placeholder="Country" value="{{ old('country') }}" required />
                        </div>

                        <div class="single-input-item">
                            <input type="submit" class="btn" style="background-color:skyblue;" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </center>
        <!-- Register Content End -->
        </div>
        </div>
        </div>
        </div>
        <!-- login register wrapper end -->
    </main>
    <!-- main wrapper end -->

    <!-- Javascript -->
    <!-- All Vendor Js -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <!-- All Plugins Js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- Active Js -->
    <script src="{{ asset('assets/js/active.js') }}"></script>
</body>

</html>