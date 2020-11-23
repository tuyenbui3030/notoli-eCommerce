<?php
class productModel extends DB {
    public function Product() {
        $qr = "SELECT * FROM product";
        return mysqli_query($this->con, $qr);
    }
}
?>