<?php
class Product extends Controller{
    public function __construct() {
        $this->cart = $this->model("CartModel");
        $this->prod = $this->model("productModel");
    }
    public function Action() {
        if(isset($_SESSION["loggedIN"])) {
            $cart_user = $_SESSION["userID"];
            $this->view("MiniLayout", [
                "page"=>"Checkout",
                //Item minicart
                "itemListCart"=>$this->cart->GetItemCart(),
                //Item đơn hàng
                "itemListOrder"=>$this->cart->GetItemCart(),

            ]);
        } else {
            $location = DOMAIN;
            header("Location: " . $location);
        }
    }
}
?>