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
        public function insertAccount() {
            $this->userModel->checkUsername("register_username", "register_password", "register_email", "token", 0);
            verification("tuyenbui3030@gmail.com", "928df9039d1fcb248189431289f669ba9d7ce5399b6a8e1a5978b4274c005c2a0898dfcbffc32bbb680b2c955522eb9adee3");
        }
    }
?>