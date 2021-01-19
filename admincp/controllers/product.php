<?php
class Product extends Controller
{
    public $prod;
    public function __construct()
    {
        $this->prod = $this->model("productModel");
    }
    public function Action()
    {
        $this->view("AdminLayout", [
            "page" => "Product",
            "itemProductBasic" => $this->prod->ShowProductBasic(),
        ]);
    }
}
