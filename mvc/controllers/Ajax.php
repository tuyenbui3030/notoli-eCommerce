<?php
    class Ajax extends Controller {
        public $userModel;
        public function __construct() {
            $this->userModel = $this->model("UserModel");
        }
        public function checkUsername() {
            $username = $_POST["username"];
            echo $this->userModel->checkUsername($username);
        }
        public function registerAccount() {
            $register_username = $_POST["register_username"];
            $register_password = $_POST["register_password"];
            $register_email = $_POST["register_email"];
            $token = bin2hex(random_bytes(50));
            $check = $this->userModel->InsertNewUser($register_username, $register_password, $register_email, $token, 0);
            $check2 = verification($register_email, $token);
            if($check && $check2) {
                echo "success";
            } else {
                echo "error";
            }
        }
    }
?>