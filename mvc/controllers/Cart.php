<?php
class Cart extends Controller {
    public $cart;
    public $prod;
    public function __construct() {
        $this->cart = $this->model("CartModel");
        $this->prod = $this->model("productModel");
    }

    //Thêm vào giỏ hàng
    public function InsertCart() {
        //Kiểm tra người dùng có login hay không
        if(isset($_SESSION['loggedIN'])) { 
            //Lấy thông tin của product muốn thêm vào giỏ hàng
            $prod_id = $_POST["product_id"];
            $data = $this->prod->SelectProduct($prod_id);
            $row = mysqli_fetch_array($data);
            $prod_title = $row["prod_title"];
            $prod_price = $row["prod_price"];
            $userID = $_SESSION["userID"];
            //Lấy ID giỏ hàng, nếu sản phẩm đã tồn tại
            $cartID = $this->cart->GetCartID($userID, $prod_id);
            if($cartID != "false") {
                $resultUpdateQuantityCart = $this->cart->UpdateQuantityCart($cartID, $cart_quantity = 1, $prod_price);
                if($resultUpdateQuantityCart == "true") {
                    exit("true");
                }
                exit("false");
            }
            //Thêm thông tin vào giỏ hàng
            $resultInsertCart = $this->cart->InsertCart($prod_id, $userID, $prod_title, $prod_price);
            if($resultInsertCart == "true") {
                exit("true");
            }
            exit("false");
        } else {
        // Không cho thêm vào giỏ hàng khi chưa login
            exit("noLogin");
        }
    }
    public function LoadCart() {
        $result = $this->cart->GetItemCart();
        $rowcount=mysqli_num_rows($result);
        print_r($rowcount);
        exit();
    }
}
?>