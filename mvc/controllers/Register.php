<?php
class Register extends Controller {
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
    ////////////    AJAX     //////////////
    //Kiểm tra tài khoản có tồn tại không
    public function checkUsername() {
        //Lấy tên username;
        $username = $_POST["username"];
        //Trả về kết quả về cho client;
        echo $this->UserModel->checkUsername($username);
    }
    //Kiểm tra email có tồn tại không
    public function checkEmail() {
        //Lấy tên username;
        $email = $_POST["email"];
        //Trả về kết quả về cho client;
        echo $this->UserModel->checkEmail($email);
    }
    //Đăng kí tài khoản
    public function registerAccount() {      
        if(!empty($_POST)) {      
            $register_username = $this->UserModel->con->real_escape_string($_POST["register_username"]);
            $register_password = $this->UserModel->con->real_escape_string($_POST["register_password"]);
            $register_email = $this->UserModel->con->real_escape_string($_POST["register_email"]);
            //Lọc thông tin đăng kí
            if(empty($register_username) || empty($register_password) || empty($register_email)) {
                exit("false");
                //return;
            }
            //Kiểm tra username đã đăng kí chưa
            $checkUsername = $this->UserModel->checkUsername($register_username);
            if($checkUsername == "true") {
                exit("false");
            }
            //Kiểm tra email đã đăng kí chưa
            $checkEmail = $this->UserModel->checkEmail($register_email);
            if($checkEmail == "true") {
                exit("false");
            }
            //Đăng kí tài khoản
            $register_password = password_hash($register_password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(50));
            $resultInsert = $this->UserModel->InsertNewUser($register_username, $register_password, $register_email, $token, 0);
            if($resultInsert) {
                $resultVerify = verification($register_email, $token);
                if($resultVerify) {
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