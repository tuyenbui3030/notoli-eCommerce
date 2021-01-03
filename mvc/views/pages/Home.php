<div class="main-content-wrapper">
    <!-- Slider area Start -->
    <section class="homepage-slider-wrapper mb--95">
        <div class="zakas-element-carousel homepage-slider" data-slick-options='{
                    "arrows": true,
                    "isCustomArrow": true,
                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" },
                    "appendArrows": ".slick-btn-wrapper"
                }'>
            <div class="single-slide slider-height bg-style d-flex align-items-center"
                style="background-image: url(public/assets/img/slider/slider-1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-7 col-sm-8">
                            <div class="slider-content bg-shape text-center ptb--100 ptb-xl--70">
                                <h1 class="heading__primary mb--30 mb-xl--20">
                                    <span class="heading__primary--sub" data-animation="fadeInUp" data-duration=".4s"
                                        data-delay=".7s">Stay Warm</span>
                                    <span class="heading__primary--main" data-animation="fadeInUp" data-duration=".4s"
                                        data-delay="1s">Winter -2019</span>
                                </h1>
                                <a href="shop.html" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                    data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide slider-height bg-style d-flex align-items-center"
                style="background-image: url(public/assets/img/slider/slider-2.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-7 col-sm-8">
                            <div class="slider-content bg-shape text-center ptb--100 ptb-xl--70">
                                <h1 class="heading__primary mb--30 mb-xl--20">
                                    <span class="heading__primary--sub" data-animation="fadeInUp" data-duration=".4s"
                                        data-delay=".7s">Stay Warm</span>
                                    <span class="heading__primary--main" data-animation="fadeInUp" data-duration=".4s"
                                        data-delay="1s">Winter -2019</span>
                                </h1>
                                <a href="shop.html" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                    data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide slider-height bg-style d-flex align-items-center"
                style="background-image: url(public/assets/img/slider/slider-3.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-7 col-sm-8">
                            <div class="slider-content bg-shape text-center ptb--100  ptb-xl--80">
                                <h1 class="heading__primary mb--30">
                                    <span class="heading__primary--sub" data-animation="fadeInUp" data-duration=".4s"
                                        data-delay=".7s">Stay Warm</span>
                                    <span class="heading__primary--main" data-animation="fadeInUp" data-duration=".4s"
                                        data-delay="1s">Winter -2019</span>
                                </h1>
                                <a href="shop.html" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                    data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slick-btn-wrapper"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider area End -->

    <!-- Product Tab area Start -->
    <section class="product-tab-area mb--50">
        <div class="container">
            <div class="row justify-content-center mb--45">
                <div class="col-xl-6 text-center">
                    <h2 class="heading__secondary mb--10">Đồng Hồ Chính Hãng</h2>
                    <p>Bạn đã sẳn sàng sở hửu cho mình chiếc đồng hồ cao cấp thời thượng chưa?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-tab tab-style-1">
                        <div class="nav nav-tabs product-tab__head justify-content-center mb--50" id="new-arrival-tab"
                            role="tablist">
                            <a class="nav-item nav-link product-tab__link active" id="new-all-tab" data-toggle="tab"
                                href="#new-all" role="tab" aria-controls="new-all" aria-selected="true">
                                <span>Mới nhất</span>
                            </a>
                            <a class="nav-item nav-link product-tab__link" id="new-men-tab" data-toggle="tab"
                                href="#new-men" role="tab" aria-controls="new-men" aria-selected="false">
                                <span>Bán chạy nhất</span>
                            </a>
                        </div>
                        <div class="tab-content" id="new-arrival-tab-content">
                            <div class="tab-pane fade show active" id="new-all" role="tabpanel"
                                aria-labelledby="new-all-tab">
                                <div class="row">
                                    <?php
                                // Hiển thị danh sách product
                                while($row = mysqli_fetch_array($data["itemTopNew"])){
                                    $product_id = $row["prod_id"]
                                    //$product_image = $row["prod_image"];
                                    // $product_title = $row["prod_title"];
                                    // $product_price = number_format($row["prod_price"], 0, '', ',')              
                                ?>
                                    <div class="col-xl-3 col-md-4 col-sm-6 mb--50">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $product_id ?>">
                                                        <img src="public/assets/img/products/<?php echo $row["prod_image"] ?>"
                                                            alt="Products">
                                                    </a>
                                                    <span class="product-badge">New</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html"
                                                            class="product_title dev-title-cart"><?php echo $row["prod_title"] ?></a>
                                                    </h3>
                                                    <div class="product-price-wrapper mb--30">
                                                        <span
                                                            class="money"><?php echo number_format($row["prod_price"], 0, '', ',')?>₫</span>
                                                        <!-- <span class="money-separator">-</span>
                                                        <span class="money">$200</span> -->
                                                    </div>
                                                    <a href="" id="<?php echo $product_id ?>"
                                                        class="btn btn-small btn-bg-sand btn-color-dark addCart">Thêm
                                                        giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="new-men" role="tabpanel" aria-labelledby="new-all-tab">
                                <div class="row">
                                <?php
                                // Hiển thị danh sách product
                                while($row = mysqli_fetch_array($data["itemTopHot"])){
                                    $product_id = $row["prod_id"]
                                    //$product_image = $row["prod_image"];
                                    // $product_title = $row["prod_title"];
                                    // $product_price = number_format($row["prod_price"], 0, '', ',')              
                                ?>
                                    <div class="col-xl-3 col-md-4 col-sm-6 mb--50">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $product_id ?>">
                                                        <img src="public/assets/img/products/<?php echo $row["prod_image"] ?>"
                                                            alt="Products">
                                                    </a>
                                                    <span class="product-badge">Hot</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html"
                                                            class="product_title dev-title-cart"><?php echo $row["prod_title"] ?></a>
                                                    </h3>
                                                    <div class="product-price-wrapper mb--30">
                                                        <span
                                                            class="money"><?php echo number_format($row["prod_price"], 0, '', ',')?>₫</span>
                                                        <!-- <span class="money-separator">-</span>
                                                        <span class="money">$200</span> -->
                                                    </div>
                                                    <a href="" id="<?php echo $product_id ?>"
                                                        class="btn btn-small btn-bg-sand btn-color-dark addCart">Thêm
                                                        giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Tab area End -->

    <!-- Banner Area Start -->
    <div class="banner-area home_01_banner_01 position-relative">
        <div class="conntainer-fluid p-0">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="banner-box">
                        <div class="banner-inner banner-bg-shape banner-info-over-img banner-info-center">
                            <figure class="banner-image">
                                <img src="public/assets/img/banner/banner-1.jpg" alt="Banner">
                            </figure>
                            <div class="banner-info">
                                <div class="banner-info--inner text-center">
                                    <p class="banner-title-1 color--white">Up Coming Discount</p>
                                    <p class="banner-title-2 color--white mb--20 mb-lg--10">On Winter Clothing</p>
                                    <a href="shop.html" class="btn banner-btn">Shop Now <i
                                            class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <a href="shop.html" class="banner-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-box">
                        <div class="banner-inner banner-bg-shape banner-info-over-img banner-info-center">
                            <figure class="banner-image">
                                <img src="public/assets/img/banner/banner-2.jpg" alt="Banner">
                            </figure>
                            <div class="banner-info">
                                <div class="banner-info--inner text-center">
                                    <p class="banner-title-1 color--white">Up Coming Discount</p>
                                    <p class="banner-title-2 color--white mb--20 mb-lg--10">On Winter Clothing</p>
                                    <a href="shop.html" class="btn banner-btn">Shop Now <i
                                            class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <a href="shop.html" class="banner-link"></a>
                        </div>
                    </div>
                </div>
                <div class="banner-badge-wrapper abs-center">
                    <span class="banner-badge">
                        <span>30%</span>
                        Off
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Method area Start -->
    <section class="method-area bg-color ptb--80 mb--95" data-bg-color="#f6f6f6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-5 col-9 mb-md--50">
                    <div class="method-box">
                        <i class="flaticon flaticon-two-circling-arrows"></i>
                        <h4>90 ngày đổi trả</h4>
                        <p>3 ngày đổi trả miễn phí</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-5 col-9 mb-md--50">
                    <div class="method-box">
                        <i class="flaticon flaticon-paper-plane"></i>
                        <h4>Miễn phí giao hàng</h4>
                        <p>Miễn phí giao hàng 100%</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-5 col-9 mb-xs--50">
                    <div class="method-box">
                        <i class="flaticon flaticon-support"></i>
                        <h4>Hỗ trợ chuyên nghiệp</h4>
                        <p>notolisotore@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-5 col-9">
                    <div class="method-box">
                        <i class="flaticon flaticon-present"></i>
                        <h4>Gift Card</h4>
                        <p>Gift Card khi mua hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Method area End -->

    <!-- Newsletter Area Start -->
    <section class="newsletter-area mb--100">
        <div class="container">
            <div class="row mb--40 pb--1">
                <div class="col-12 text-center">
                    <h2 class="heading__secondary mb--10">Subscribe To Our Newsletter</h2>
                    <p class="max-w-60 max-w-sm-95 mx-auto">Lorem og elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <form class="newsletter-form mc-form"
                        action="https://company.us19.list-manage.com/subscribe/post?u=2f2631cacbe4767192d339ef2&amp;id=24db23e68a"
                        method="post" target="_blank">
                        <input type="email" name="newsletter_email" id="newsletter_email" class="newsletter-form__input"
                            placeholder="Enter Your E-mail Address">
                        <input type="submit" value="Subscribe Now" class="newsletter-form__submit">
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div>
                    <!-- mailchimp-alerts end -->
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Area End -->
</div>