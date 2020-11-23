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

    public function UserRegister() {
        if(isset($_POST["btnRegister"])) {
            //Step 1: Lấy dữ liệu người dùng nhập vào;
            $register_username = $_POST["register_username"];
            $register_password = $_POST["register_password"];
            $register_password = password_hash($register_password, PASSWORD_DEFAULT);
            $register_email = $_POST["register_email"];
            $token = "l&9*9f%f!j23d%3l&9*9f%f!j23d%37fsf#@%17fsf#@%1";
            $verified = 1;
            //Step 2: Insert database vào bảng users
            $kq = $this->UserModel->InsertNewUser($register_username, $register_password, $register_email, $token, $verified);
            //Báo cáo kết quả đăng kí
            $this->view("MiniLayout", [
                "page"=>"Register",
                "result" => $kq
            ]);
        }
    }
}
?>