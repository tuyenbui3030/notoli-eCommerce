<!-- partial:partials/_header.html -->
<!-- partial -->
<div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Products
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link active" href="admincp/product"><i class="icon icon-list"></i>All Products</a>
                    </li>
                    <li>
                        <a class="nav-link" href="admincp/productcontrol"><i class="icon icon-plus-circle"></i> Add New Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b shadow">
                        <div class="card-header white">
                            <form method="GET" action="" name="formSearchProd" id="formSearchProd">
                                <div class="form-group has-right-icon m-0">
                                    <input class="form-control light r-30" name="search" placeholder="Tìm kiếm sản phẩm" type="text">
                                    <i type="submit" class="icon-search submitSearch"></i>
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <tbody>
                                        <?php
                                        while ($rows = mysqli_fetch_array($data["itemProductBasic"])) {
                                            $id = $rows["prod_id"];
                                            $image = $rows["prod_image"];
                                            $title = $rows["prod_title"];
                                            $price = $rows["prod_price"];
                                            $quantity = $rows["prod_quantity"];
                                            $brand = $rows["brand_title"];
                                            $categories = $rows["cat_title"];
                                        ?>
                                            <tr class="no-b">
                                                <td class="w-10">
                                                    <img src="public/assets/img/products/<?php echo $image ?>" alt="">
                                                </td>
                                                <td>
                                                    <h6><?php echo $title ?></h6>
                                                    <small class="text-muted">Còn <?php echo $quantity ?> cái</small>
                                                </td>
                                                <td><?php echo number_format($price, 0, '', '.') ?> ₫</td>
                                                <td><span class="badge badge-success">Published</span></td>
                                                <td>
                                                    <span><?php echo $brand ?></span><br>
                                                    <span><?php echo $categories ?> </span>
                                                </td>
                                                <td>
                                                    <a href="admincp/productcontrol?product=<?php echo $id ?>" class="btn-fab btn-fab-sm btn-primary shadow text-white"><i class="icon-pencil"></i></a>
                                                    <a class="btn-fab btn-fab-sm btn-danger shadow text-white"><i class="icon-trash-can4"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="pt-3" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- partial:partials/_foot.html -->
<!-- partial -->