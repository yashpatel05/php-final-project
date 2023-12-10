@extends('layouts.app')

@section('title', 'My Account')

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
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area bg-img" data-bg="{{ asset('assets/img/banner/breadcrumb-banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">My Account</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('myaccount') }}">My Account</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="my-account-wrapper section-padding">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboard" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i> Dashboard</a>
                                    <a href="{{ route('myorder') }}"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment Method</a>
                                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                    <a href="#change-password" data-toggle="tab"><i class="fa fa-key"></i> Change Password</a>
                                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong>{{ $user->name }}</strong></p>
                                            </div>
                                            <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your address and edit your password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Payment Method</h3>
                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <div class="col-lg-6">
                                                <h3>Account Details</h3>
                                                <div class="account-details-form">
                                                    <form action="{{ route('myaccount.update') }}" method="POST">
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
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="User-name" class="required">User Name</label>
                                                                    <input type="text" id="userName" name="userName" value="{{ $user->name }}" placeholder="User Name" />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="Email" class="required">Email Address</label>
                                                                    <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Email Address" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="Contact_no" class="required">Contact no</label>
                                                                    <input type="text" id="contactNo" name="contactNo" value="{{ $user->contact_no }}" placeholder="Contact no" />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="Address" class="required">Street Address</label>
                                                                    <input type="textarea" id="streetAddress" name="streetAddress" value="{{ $user->street_address }}" placeholder="Street Address" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="City" class="required">City</label>
                                                                    <input type="text" id="city" name="city" value="{{ $user->city }}" placeholder="City" />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="State" class="required">State</label>
                                                                    <input type="text" id="state" name="state" value="{{ $user->state }}" placeholder="State" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="Postal_code" class="required">Postal Code</label>
                                                                    <input type="text" id="postalCode" name="postalCode" value="{{ $user->postal_code }}" placeholder="Postal Code" />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="Country" class="required">Country</label>
                                                                    <input type="text" id="country" name="country" value="{{ $user->country }}" placeholder="Country" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <button type="submit" value="Send Message" class="btn">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->

                                    <div class="tab-pane fade" id="change-password" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Password change</h3>
                                            <form action="{{ route('change-password') }}" method="POST">
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
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="CurrentPassword" class="required">Current Password</label>
                                                            <input type="password" id="CurrentPassword" name="CurrentPassword" placeholder="Current Password" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="NewPassword" class="required">New Password</label>
                                                            <input type="password" id="NewPassword" name="NewPassword" placeholder="New Password" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="ConfirmNewPassword" class="required">Confirm New Password</label>
                                                            <input type="password" id="ConfirmNewPassword" name="ConfirmNewPassword" placeholder="Confirm New Password" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <button type="submit" class="btn">Change Password</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
</main>
<!-- main wrapper end -->
@endsection