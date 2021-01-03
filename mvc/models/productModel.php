<?php
class productModel extends DB {
    //Show sản phẩm, trang chủ
    public function Product() {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
    //Tồn kho
    public function InStock($prod_id) {
        $qr = "SELECT prod_quantity FROM products WHERE prod_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows["prod_quantity"]);
    }
    //Show sản phẩm trang sản phẩm
    public function SelectAllProduct() {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
    public function SelectProduct($prod_id) {
        $qr = "SELECT prod_title, prod_price FROM products WHERE prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Show hãng sản phẩm
    public function SelectBrand() {
        $qr = "SELECT * FROM brands";
        return mysqli_query($this->con, $qr);
    }
    //Show chi tiết sản phẩm
    public function ShowDetailsProduct($prod_id) {
        $qr = "SELECT * FROM products WHERE prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Hiện thị danh sách hình ảnh
    public function ShowListPhoto($prod_id) {
        $qr = "SELECT photo_name FROM photos WHERE photo_prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Cập nhật lượt xem
    public function UpView($prod_id) {
        $qr = "UPDATE `products` SET `prod_view` = `prod_view` + 1 WHERE `prod_id` = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Lấy số lượng sản phẩm đã bán
    public function GetSold($prod_id) {
        $qr = "SELECT SUM(quantity) FROM orderdetails WHERE product_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }   
     
    public function GetTitleBrand($prod_id) {
        $qr = "SELECT `brands`.`brand_title` FROM `brands` JOIN `products` ON `brands`.`brand_id` = `products`.`prod_brand` WHERE `products`.`prod_id` = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }
    public function ShowFiveProduct($prod_id) {
        $qr = "SELECT prod_cat FROM products WHERE prod_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $cat_id = mysqli_fetch_array($result);
        $cat_id = $cat_id[0];
        $qr = "SELECT prod_id, prod_title, prod_price, prod_image FROM `products` WHERE prod_cat = $cat_id ORDER BY RAND() LIMIT 5";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
}
?>