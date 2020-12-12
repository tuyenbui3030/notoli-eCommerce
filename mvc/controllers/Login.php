<?php
class Login extends Controller {
    public $UserModel;
    public function __construct() {
        // Khởi tạo model
        $this->UserModel = $this->model("UserModel");
    }
    public function Action() {
        if(isset($_SESSION['loggedIN'])) {
            $location = "./";
            header("Location: " . $location);
            exit();
        }
        $this->view("MiniLayout", [
            "page"=>"Login"
        ]);
    }
    public function loginPageController() {
        if(isset($_POST['login'])) {
            $username = $this->UserModel->con->real_escape_string($_POST["usernamePHP"]);
            $password = $this->UserModel->con->real_escape_string($_POST["passwordPHP"]);
            $result = $this->UserModel->loginPageModel($username, $password);
            //echo $result;
            if($result == "true") {
                $_SESSION['loggedIN'] = '1';
                $_SESSION['username'] = $username;
                echo $result;
            } else {
                echo $result;
            }
        } else {
            $this->view("MiniLayout", [
                "page"=>"404"
            ]);
        }
    }

        // public function loginPageController() {
        // if(isset($_POST['btnLogin'])) {
        //     $username = $this->UserModel->con->real_escape_string($_POST["login_username"]);
        //     $password = $this->UserModel->con->real_escape_string($_POST["login_password"]);
        //     $result = $this->UserModel->loginPageModel($username, $password);
        //     if($result == "true") {
        //         $location = "../";
        //         header("Location: " . $location);
        //         exit;
        //     }
        // }
        //}
}
?>