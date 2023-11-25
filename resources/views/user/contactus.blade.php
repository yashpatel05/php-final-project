@extends('layouts.app')

@section('title', 'Contact US')

@section('content')

<main>
    <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">Contact Us</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-message">
                        <h2 class="contact-title">Fill Information</h2>
                        <form method="post" action="{{ route('contactus.store') }}">
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
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="name" placeholder="Name *" type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="phone" placeholder="Phone *" type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="email" placeholder="Email *" type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="subject" placeholder="subject *" type="text" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea name="message" placeholder="message *"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="contact-btn">
                                        <button type="submit" value="Send Message" class="btn" type="submit">Submit</button>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info pt-0">
                        <h2 class="contact-title">contact us</h2>
                        <p>Our executive will help solve your problem.</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Address: Humber College, North Campus, 205 Humber College Blvd., Toronto</li>
                            <li><i class="fa fa-phone"></i> team404@gmail.com</li>
                            <li><i class="fa fa-envelope-o"></i>+1 365-366-5932</li>
                        </ul>
                        <div class="working-time">
                            <h3>Working Hours</h3>
                            <p class="pb-0"><span>Monday – Saturday:</span> 24*7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection