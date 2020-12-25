<?php
class Index extends Controller {
    public $prod;
    public $cart;
    public function __construct() {
        $this->prod = $this->model("productModel");
        $this->cart = $this->model("CartModel");
    }
    public function Action() {
        $this->view("MiniLayout", [
            "page"=>"Index",
            "itemProduct"=>$this->prod->Product(),
            "itemCart"=>$this->cart->GetItemCart()
        ]);
    }
    public function Test() {
        $this->view("Cart");
    }
}
?>