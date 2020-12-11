<?php
class Login extends Controller {
    public $UserModel;
    public function __construct() {
        // Khởi tạo model
        $this->UserModel = $this->model("UserModel");
    }
    public function Action() {
        $this->view("MiniLayout", [
            "page"=>"Login"
        ]);
    }
}
?>