@extends('layouts.app')

@section('title', 'Add Feedback')

@section('content')
<main>
    <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">Add Feedback</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add new feedback area section start -->
    <div class="contact-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-message">
                        <h2 class="contact-title">Add New Feedback</h2>
                        <form method="post" action="{{ route('feedback.store') }}">
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
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <select name="product_id" class="form-control" id="productSelect" required>
                                        <!-- Loop through your products to populate the dropdown -->
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}" data-image="{{ asset('assets/img/product/' . $product->image) }}" data-description="{{ $product->description }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <img id="productImage" src="" alt="Product Image" class="img-fluid">
                                </div>
                                <div class="col-lg-6">
                                    <p id="productDescription"></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <textarea name="feedback" placeholder="Your Feedback" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="contact-btn">
                                        <button type="submit" class="btn" type="submit">Submit Feedback</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add new feedback area section end -->

    <script>
        // Use jQuery to dynamically update image and description based on selected product
        $(document).ready(function() {
            $('#productSelect').change(function() {
                var selectedOption = $(this).find('option:selected');
                var imageSrc = selectedOption.data('image');
                var description = selectedOption.data('description');

                $('#productImage').attr('src', imageSrc);
                $('#productDescription').text(description);
            });
        });
    </script>

</main>
@endsection