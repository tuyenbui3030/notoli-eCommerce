<?php
class productModel extends DB {
    public function Product() {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
}
?>