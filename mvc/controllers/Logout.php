<?php
class Logout extends Controller {
    public $UserModel;
    public function __construct() {
        // Khởi tạo model
        $this->UserModel = $this->model("UserModel");
    }
    public function Action() {
        if(isset($_SESSION['loggedIN'])) {
            unset($_SESSION['loggedIN']);
        }
        $this->view("MiniLayout", [
            "page"=>"Login"
        ]);
    }
}
?>