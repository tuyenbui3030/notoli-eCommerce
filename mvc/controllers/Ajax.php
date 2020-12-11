<?php
    class Ajax extends Controller {
        public $userModel;
        public function __construct() {
            $this->userModel = $this->model("UserModel");
        }

        //Kiểm tra tài khoản có tồn tại không
        public function checkUsername() {
            $username = $_POST["username"];
            echo $this->userModel->checkUsername($username);
        }

        //Đăng kí tài khoản
        public function registerAccount() {
            $register_username = $_POST["register_username"];
            $register_password = $_POST["register_password"];
            $register_email = $_POST["register_email"];
            
            //Lọc thông tin đăng kí
            if(empty($register_username) || empty($register_password) || empty($register_email)) {
                echo "error";
                return;
            }
            $checkUsername = $this->userModel->checkUsername($register_username);
            if($checkUsername == "true") {
                echo "error";
                return;
            }

            //Đăng kí tài khoản
            $register_password = password_hash($register_password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(50));
            $resultInsert = $this->userModel->InsertNewUser($register_username, $register_password, $register_email, $token, 0);
            if($resultInsert) {
                $resultVerify = verification($register_email, $token);
                if($resultVerify) {
                    echo "success";
                    return true;
                } else {
                    echo "error";
                    return fale;
                }
            }
        }
    }
?>