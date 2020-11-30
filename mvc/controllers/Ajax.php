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
    }
?>