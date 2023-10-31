<!DOCTYPE html>
<?php
    use Humber\Models\Database;
    use Humber\Models\Shoe;

    // Include autoload composer
    require_once '../vendor/autoload.php';

    // Get a database connection
    $dbcon = Database::getDb();

    // Create an instance of the Shoe model
    $shoe = new Shoe();
?>

<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>The Shoe Company</title>
    <!-- All Plugins CSS -->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <!-- All Vendor CSS -->
    <link href="assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Modernizer JS -->
    <script src="assets/js/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!-- Start Header Area -->
    <header class="header-area">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top theme-bg">
                <div>
                    <div class="welcome-message" style="text-align:center;">
                        <p>Welcome to The Shoe Company online store</p>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">
                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/theshoecompany.png" alt="brand logo" style="height:115px; width:115px; max-width: 100%;">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-8 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="active"><a href="index.php">Home</a></li>
                                            <li class="static"><a href="#">Category <i class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">
                                                    <?php
                                                        // Get all categories from the database using the Shoe model
                                                        $categories = $shoe->getAllCategories($dbcon);
                                                        foreach ($categories as $category) {
                                                            $cid = $category->id;
                                                    ?>
                                                    <li class="mega-title"><a href="#"><?php echo $category->name ?></a>
                                                        <ul>
                                                            <?php
                                                            // Get all subcategories based on a specific category ID from the database
                                                            $subCategories = $shoe->getSubCategoriesByCategoryId($dbcon, $category->id);

                                                            foreach ($subCategories as $row1) {
                                                            ?>
                                                            <li><a href="#products.php?id=<?php echo $row1->id ?>"><?php echo $row1->name ?></a></li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li><a href="#feedback.php">Feedback</a></li>
                                            <li><a href="#contactus.php">Contact us</a></li>
                                            <!-- <?php
                                                if(isset($_SESSION['User_id'])) {
                                            ?> -->
                                            <li><a href="#myorder.php">My order</a></li>
                                            <!-- <?php } ?> -->
                                            <li><a href="#aboutus.php">About Us</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-2">
                            <div class="header-configure-wrapper">
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li>
                                            <a href="#" class="offcanvas-btn">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>
                                        </li>

                                        <li class="user-hover">
                                            <a href="#">
                                                <i class="ion-ios-gear-outline"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <?php
                                                if(isset($_SESSION['User_id'])) {
                                                ?>
                                                <!-- Some Code -->
                                                <?php
                                                } else {
                                                ?>
                                                <li><a href="#login.php">login</a></li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($_SESSION['User_id'])) {
                                                ?>
                                                <!-- Some Code -->
                                                <?php
                                                } else {
                                                ?>
                                                <li><a href="#register.php">register</a></li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($_SESSION['User_id'])) {
                                                ?>
                                                <li><a href="#account.php">My account</a></li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($_SESSION['User_id'])) {
                                                ?>
                                                <li><a href="#logout.php">logout</a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="ion-bag"></i>
                                                <div class="notification">
                                                    <!-- <?php echo $cart_count; ?> -->
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->
                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/theshoecompany.png" alt="Brand Logo" style="height:58px; width:58px;">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="#cart.html">
                                        <i class="ion-bag"></i>
                                    </a>
                                </div>
                                <div class="mobile-menu-btn">
                                    <div class="off-canvas-btn">
                                        <i class="ion-navicon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
    </header>
    <!-- end Header Area -->

    <!-- off-canvas menu start -->