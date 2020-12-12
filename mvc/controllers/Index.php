<?php
class Index extends Controller {
    public $prod;
    public function __construct() {
        $this->prod = $this->model("productModel");
    }
    public function Action() {
        //$prod = $this->model("productModel");
        $this->view("MiniLayout", [
            "page"=>"Index",
            "itemProduct"=>$this->prod->Product()  
        ]);
    }
}
?>