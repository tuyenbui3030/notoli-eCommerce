<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="http://localhost/notoli/" target="_blank">
    <title>Zakas - Fashion eCommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="./public/assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./public/assets/img/icon.png">

    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./public/assets/css/vendor.css">

    <!-- style css -->
    <link rel="stylesheet" href="./public/assets/css/main.css">

</head>

<body>

    <!-- Preloader Start -->
    <div class="zakas-preloader active">
        <div class="zakas-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="zakas-child zakas-bounce1"></div>
            <div class="zakas-child zakas-bounce2"></div>
            <div class="zakas-child zuka-bounce3"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Start -->
        <?php require_once "./mvc/views/blocks/header.php" ?>
        <!-- Header End -->

        <!-- Breadcrumb area Start -->
        <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                            <h1 class="page-title">Register</h1>
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="current"><span>Register</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div class="main-content-wrapper">
            <div class="page-content-inner pt--75 pb--80">
                <div class="container">
                    <div class="row">
                        <!-- login -->
                        <!-- register -->
                        <?php require_once "./mvc/views/pages/". $data["page"] . ".php" ?>


                    </div>

                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->

        <!-- Footer Start-->
        <?php require_once "./mvc/views/blocks/footer.php" ?>

        <!-- Footer End-->

        <!-- Searchform Popup Start -->
        <?php require_once "./mvc/views/blocks/search.php" ?>

        <!-- Searchform Popup End -->

        <!-- Mini Cart Start -->
        <?php require_once "./mvc/views/blocks/miniCart.php" ?>

        <!-- Mini Cart End -->

        <!-- Global Overlay Start -->
        <div class="zakas-global-overlay"></div>
        <!-- Global Overlay End -->

        <!-- Qicuk View Modal Start -->
        <div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="flaticon flaticon-cross"></i></span>
                        </button>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="zakas-element-carousel nav-vertical-center" data-slick-options='{
                            "slidesToShow": 1,
                            "slidesToScroll": 1,
                            "arrows": true,
                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" }
                        }'>
                                    <div class="product-image">
                                        <div class="product-image--holder">
                                            <a href="product-details.html">
                                                <img src="./public/assets/img/products/prod-9-1.jpg" alt="Product Image"
                                                    class="primary-image">
                                            </a>
                                        </div>
                                        <span class="product-badge sale">sale</span>
                                    </div>
                                    <div class="product-image">
                                        <div class="product-image--holder">
                                            <a href="product-details.html">
                                                <img src="./public/assets/img/products/prod-9-1.jpg" alt="Product Image"
                                                    class="primary-image">
                                            </a>
                                        </div>
                                        <span class="product-badge sale">sale</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="modal-box product-summary">
                                    <div class="product-navigation text-right mb--20">
                                        <a href="#" class="prev"><i class="fa fa-angle-double-left"></i></a>
                                        <a href="#" class="next"><i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                    <div class="product-rating d-flex mb--20">
                                        <div class="star-rating star-three">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title mb--20">Black Blazer</h3>
                                    <p class="product-short-description mb--25">Donec accumsan auctor iaculis. Sed
                                        suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices
                                        justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula
                                        lacus scelerisque. Vestibulum ut sem laoreet, feugiat tellus at, hendrerit arcu.
                                    </p>
                                    <div class="product-price-wrapper mb--25">
                                        <span class="money">$200.00</span>
                                        <span class="price-separator">-</span>
                                        <span class="money">$400.00</span>
                                    </div>
                                    <form action="#" class="variation-form mb--30">
                                        <div class="product-color-variations d-flex align-items-center mb--20">
                                            <p class="variation-label">Color:</p>
                                            <div class="product-color-variation variation-wrapper">
                                                <div class="variation">
                                                    <a class="product-color-variation-btn red selected"
                                                        data-toggle="tooltip" data-placement="top" title="Red">
                                                        <span class="product-color-variation-label">Red</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-color-variation-btn black" data-toggle="tooltip"
                                                        data-placement="top" title="Black">
                                                        <span class="product-color-variation-label">Black</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-color-variation-btn pink" data-toggle="tooltip"
                                                        data-placement="top" title="Pink">
                                                        <span class="product-color-variation-label">Pink</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-color-variation-btn blue" data-toggle="tooltip"
                                                        data-placement="top" title="Blue">
                                                        <span class="product-color-variation-label">Blue</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-size-variations d-flex align-items-center mb--15">
                                            <p class="variation-label">Size:</p>
                                            <div class="product-size-variation variation-wrapper">
                                                <div class="variation">
                                                    <a class="product-size-variation-btn selected" data-toggle="tooltip"
                                                        data-placement="top" title="S">
                                                        <span class="product-size-variation-label">S</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip"
                                                        data-placement="top" title="M">
                                                        <span class="product-size-variation-label">M</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip"
                                                        data-placement="top" title="L">
                                                        <span class="product-size-variation-label">L</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip"
                                                        data-placement="top" title="XL">
                                                        <span class="product-size-variation-label">XL</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="reset_variations">Clear</a>
                                    </form>
                                    <div
                                        class="product-action d-flex flex-sm-row flex-column align-items-sm-center align-items-start mb--30">
                                        <div
                                            class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                            <label class="quantity-label" for="quick-qty">Quantity:</label>
                                            <div class="quantity">
                                                <input type="number" class="quantity-input" name="qty" id="quick-qty"
                                                    value="1" min="1">
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="btn btn-small btn-bg-red btn-color-white btn-hover-2"
                                            onclick="window.location.href='cart.html'">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="product-footer-meta">
                                        <p><span>Category:</span>
                                            <a href="shop.html">Full Sweater</a>,
                                            <a href="shop.html">SweatShirt</a>,
                                            <a href="shop.html">Jacket</a>,
                                            <a href="shop.html">Blazer</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Qicuk View Modal End -->
    </div>
    <!-- Main Wrapper End -->


    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="./public/assets/js/vendor.js"></script>

    <!-- Main JS -->
    <script src="./public/assets/js/main.js"></script>

</body>

</html>