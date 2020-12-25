<?php
class CartModel extends DB {
    //Show dữ liệu giỏ hàng
    public function GetItemCart() {
        $userID = $_SESSION["userID"];
        $qr = "SELECT `cart`.*, `products`.`prod_image`";
        $qr .= "FROM `cart` JOIN `products` ON `cart`.`cart_prodID` = `products`.`prod_id`";
        $qr .= "WHERE `cart`.`cart_user`=$userID";
        return mysqli_query($this->con, $qr);
    }
    //Thêm vào giỏ hàng
    public function InsertCart($prod_id, $userID, $prod_title, $prod_price) {
        $qr = "INSERT INTO `cart` VALUES (NULL, '$userID', '$prod_id', '$prod_title', '1', '$prod_price')";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy UserID quản lí giỏ hàng
    public function GetUserID($username) {
        $qr = "SELECT user_id FROM users WHERE user_username = '$username'";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows["user_id"]);
    }
    //Kiểm tra sản phảm được user thêm vào nhiều lần
    public function GetCartID($userID, $prod_id) {
        $qr = "SELECT cart_id FROM cart WHERE cart_user = '$userID' AND cart_prodID = '$prod_id'";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        if($rows) {
            return json_encode($rows["cart_id"]);
        }
        return json_encode(false);
    }
    //Cập nhật số lượng trong giỏ hàng
    public function UpdateQuantityCart($cart_id, $cart_quantity, $cart_price) {
        //Lấy số lượng sản phẩm hiện lại
        $qr = "SELECT cart_quantity FROM `cart` WHERE cart_id = $cart_id";
        //return json_encode($qr);

        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        $cart_quantity = $cart_quantity + $rows["cart_quantity"];
        $cart_price = $cart_price * $cart_quantity;
        //Cập nhật lại số lượng sản phẩm
        $qr = "UPDATE `cart`
        SET `cart_quantity` = '$cart_quantity', `cart_price` = '$cart_price'
        WHERE `cart`.`cart_id` = $cart_id";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
}
?>