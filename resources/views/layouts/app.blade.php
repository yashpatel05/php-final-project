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
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
</head>

<body>
    <!-- Start Header Area -->
    <header class="header-area">
        @include('user.header')
    </header>
    <!-- end Header Area -->

    <!-- off-canvas menu start -->


    <div class="content">
        @yield('content')
    </div>


    <!-- Start Footer Area Wrapper -->
    <footer class="footer-wrapper">
        @include('user.footer')
    </footer>
    <!-- End Footer Area Wrapper -->

    <!-- offcanvas search form start -->
    <div class="offcanvas-search-wrapper">
        <!-- Off-canvas search content here -->
    </div>
    <!-- offcanvas search form end -->

    <!-- offcanvas mini cart start -->
    <div class="offcanvas-minicart-wrapper">
        <!-- Off-canvas mini cart content here -->
    </div>
    <!-- offcanvas mini cart end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!--=======================Javascript============================-->
    <!-- All Vendor Js -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <!-- All Plugins Js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- Active Js -->
    <script src="{{ asset('assets/js/active.js') }}"></script>
</body>

</html>