<?php
class Product extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = $this->model("productModel");
    }
    public function Action()
    {
        $this->view("AdminLayout", [
            "page" => "Product",
        ]);
    }
}
