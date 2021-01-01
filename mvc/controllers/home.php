<?php
class Home extends Controller {
    public $prod;
    public $cart;
    public function __construct() {
        $this->prod = $this->model("productModel");
        $this->cart = $this->model("CartModel");
    }
    public function Action() {
        $this->view("MiniLayout", [
            "page"=>"Home",
            "itemProduct"=>$this->prod->Product(),
            "itemListCart"=>$this->cart->GetItemCart()
        ]);
    }
    public function Test() {
        $this->view("Cart");
    }
}
?>