<?php
class Register extends Controller {
    public $UserModel;
    public function __construct() {
        // Khởi tạo model
        $this->UserModel = $this->model("UserModel");
    }
    public function Action() {
        $this->view("MiniLayout", [
            "page"=>"Register"
        ]);
    }
    public function Verify($token) {
        $result = $this->UserModel->VerifyNewUser($token);
        if($result == 'true') {
            $this->view("MiniLayout", [
                "page"=>"Verify",
                "result"=>$result
            ]);
        } else {
            $this->view("MiniLayout", [
                "page"=>"404"
            ]);
        }
    }
}
?>