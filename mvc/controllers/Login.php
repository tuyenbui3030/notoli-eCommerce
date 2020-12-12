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
    public function reset($token=NULL) {
        if($token == NULL) {
            $this->view("MiniLayout", [
                "page"=>"Reset",
                "case"=>"true"
            ]);
        } else {
            $this->view("MiniLayout", [
                "page"=>"Reset",
                "case"=>"false"
            ]);
        }
    }



    public function sendMail() {      
        if(!empty($_POST)) {      
            $recover_email = $this->UserModel->con->real_escape_string($_POST["recover_email"]);
            //Lọc thông tin đăng kí
            if(empty($recover_email)) {
                exit("false");
                //return;
            }

            //Kiểm tra email đã đăng kí chưa
            $checkEmail = $this->UserModel->checkEmail($recover_email);
            if($checkEmail == "true") {
                $token = $this->UserModel->SelectToken($recover_email);
                $token = json_decode($token);
                $resultSendMail = forgotPassword($recover_email, $token);
                if($resultSendMail) {
                    exit("true");
                } else {
                    exit("false");
                }
            }
        } else {
            $this->view("MiniLayout", [
                "page"=>"404"
            ]);
        }
    }
}
?>