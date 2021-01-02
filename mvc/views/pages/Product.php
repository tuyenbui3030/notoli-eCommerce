        <!-- Breadcrumb area Start -->
        <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                            <h1 class="page-title">Sản phẩm</h1>
                            <ul class="breadcrumb">
                                <li><a href="index.html">Trang chủ</a></li>
                                <li class="current"><span>sản phẩm</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div  class="main-content-wrapper">
            <div class="shop-page-wrapper shop-fullwidth ptb--80">
                <div class="container">
                    <div class="row mb--50">
                        <div class="col-12">
                            <div class="shop-toolbar">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-md--50 mb-xs--10">
                                        <div class="shop-toolbar__left d-flex align-items-sm-center align-items-start flex-sm-row flex-column">
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="shop-toolbar__right d-flex justify-content-lg-end justify-content-start flex-sm-row flex-column">
                                            <div class="product-ordering mb-xs--15 mr--50 mr-xs--0">
                                                <select class="product-ordering__select nice-select">
                                                <?php while($rows = mysqli_fetch_array($data["listBrand"])) {?>
                                                    <option value="<?php echo $rows["brand_id"] ?>"><?php echo $rows["brand_title"] ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <div class="product-ordering">
                                                <select class="product-ordering__select nice-select">
                                                    <option value="0">Default Sorting</option>
                                                    <option value="1">Relevance</option>
                                                    <option value="2">Name, A to Z</option>
                                                    <option value="3">Name, Z to A</option>
                                                    <option value="4">Price, low to high</option>
                                                    <option value="5">Price, high to low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid shop-products">
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="product-tab-content">
                                <div class="tab-pane fade show active" id="nav-all">
                                    <div class="row xxl-block-grid-6 grid-space-20">
                                    <?php
                                        while($rows = mysqli_fetch_array($data["allProduct"])) {
                                            $product_id = $rows["prod_id"];
                                            $product_image = $rows["prod_image"];
                                            $product_title = $rows["prod_title"];
                                            $product_price = number_format($rows["prod_price"], 0, '', ',');
                                    ?>
                                        <div class="col-xl-3 col-md-4 col-sm-6 mb--50">
                                            <div class="zakas-product">
                                                <div class="product-inner">
                                                    <figure class="product-image">
                                                        <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $product_id ?>">
                                                            <img src="./public/assets/img/products/<?php echo $product_image ?>" alt="Products">
                                                        </a>
                                                        <span class="product-badge">New</span>
                                                    </figure>
                                                    <div class="product-info">
                                                        <h3 class="product-title mb--15">
                                                            <a href="product-details.html"> <?php echo $product_title; ?></a>
                                                        </h3>
                                                        <div class="product-price-wrapper mb--30">
                                                            <span class="money"><?php echo $product_price; ?> ₫</span>
                                                        </div>
                                                        <a href="" id="<?php echo $product_id ?>"class="btn btn-small btn-bg-sand btn-color-dark addCart">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                            <nav class="pagination-wrap mt--35 mt-md--25">
                                <ul class="pagination">
                                    <li><a href="#" class="prev page-number"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li><span class="current page-number">1</span></li>
                                    <li><a href="#" class="page-number">2</a></li>
                                    <li><a href="#" class="page-number">3</a></li>
                                    <li><a href="#" class="next page-number"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->