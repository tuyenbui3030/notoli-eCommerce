<?php
class productModel extends DB {
    public function Product() {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
    public function SelectProduct($prod_id) {
        $qr = "SELECT prod_title, prod_price FROM products WHERE prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    public function ShowSize() {
        $qr = "SELECT `size`.`size_name` FROM `size` JOIN `products` ON `size`.`size_prod_id` = `products`.`prod_id`";
        return mysqli_query($this->con, $qr);
    }
}
?>