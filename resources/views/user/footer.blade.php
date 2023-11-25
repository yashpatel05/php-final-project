<!-- footer main area start -->
<div class="footer-widget-area section-padding">
    <div class="container">
        <div class="row mtn-40">
            <!-- footer widget item start -->
            <div class="col-xl-5 col-lg-3 col-md-6">
                <div class="widget-item mt-40">
                    <h5 class="widget-title">My Account</h5>
                    <div class="widget-body">
                        <ul class="location-wrap">
                            <li><i class="ion-ios-location-outline"></i>Humber College, North Campus, 205 Humber College Blvd., Toronto</li>
                            <li><i class="ion-ios-email-outline"></i>Mail Us: <a href="#MailTo:team404@gmail.com">team404@gmail.com</a></li>
                            <li><i class="ion-ios-telephone-outline"></i>Phone: <a href="#">+1 365-366-5932</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- footer widget item end -->

            <!-- footer widget item start -->
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="widget-item mt-40">
                    <h5 class="widget-title">Categories</h5>
                    <div class="widget-body">
                        <ul class="useful-link">
                            @foreach($categories as $category)
                            <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- footer widget item end -->

            <!-- footer widget item start -->
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="widget-item mt-40">
                    <h5 class="widget-title">Information</h5>
                    <div class="widget-body">
                        <ul class="useful-link">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#aboutus.php">About Us</a></li>
                            <li><a href="#contactus.php">Contact Us</a></li>
                            <li><a href="#">Returns & Exchanges</a></li>
                            <li><a href="#">Shipping & Delivery</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- footer widget item end -->

            <!-- footer widget item start -->
            <div class="col-xl-2 col-lg-3 offset-xl-1 col-md-6">
                <div class="widget-item mt-40">
                    <h5 class="widget-title">Quick Links</h5>
                    <div class="widget-body">
                        <ul class="useful-link">
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Orders Tracking</a></li>
                            <li><a href="#">Size Guide</a></li>
                            <li><a href="#">Shopping Rates</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- footer widget item end -->
        </div>
    </div>
</div>
<!-- footer main area end -->

<!-- footer bottom area start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-2 order-md-1">
                <div class="copyright-text text-center text-md-left">
                    <p>Copyright 2023 <a href="index.php">The Shoe Company</a>. All Rights Reserved</p>
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <div class="footer-social-link text-center text-md-right">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer bottom area end -->