@extends('layouts.app')

@section('title', 'Wishlist')

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
    <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">Wishlist</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
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
                                        <th class="pro-date">Date</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wishlistItems as $wishlist)
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{ asset('assets/img/product/' . $wishlist->product->image) }}" alt="Product" /></a></td>
                                        <td class="pro-title">{{ $wishlist->product->name }}</td>
                                        <td class="pro-date">{{ $wishlist->created_at }}</td>
                                        <td class="pro-price"><span>CAD {{ $wishlist->product->price }}</span></td>
                                        <td><a href="{{ route('wishlist.delete', ['id' => $wishlist->product->id]) }}"><img src="{{ asset('admin/assets/img/delete.png') }}" height="30"></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>
<!-- main wrapper end -->
@endsection