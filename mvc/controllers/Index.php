<?php
class Index extends Controller {
    public $prod;
    public function __construct() {
        $this->prod = $this->model("productModel");
    }
    public function Action() {
        //$prod = $this->model("productModel");
        $this->view("MasterLayout", [
            "page"=>"Home",
            "itemProduct"=>$this->prod->Product()  
        ]);
    }
}
?>