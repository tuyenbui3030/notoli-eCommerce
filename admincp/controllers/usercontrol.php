<?php
class UserControl extends Controller
{
    public $user;
    public $request;
    public function __construct()
    {
        $this->user = $this->model("UserModel");
        $this->request = new Request();
    }
    private function AddUser()
    {
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $fullname = $this->request->getPost("fullname");
        $dob = $this->request->getPost("dob");
        $email = $this->request->getPost("email");
        $city = $this->request->getPost("city");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $role = $this->request->getPost("role");
        $status = $this->request->getPost("status");
        //Kiểm tra username đã đăng kí chưa
        $resultCheckUsername = $this->user->checkUsername($username);
        //Kiểm tra email đã đăng kí chưa
        $resultCheckEmail = $this->user->checkEmail($email);
        if ($resultCheckUsername == "true") {
            $message = "<p class='mt-2 text-danger'><i class='icon-info2'></i> Tên tài khoản đã tồn tại</p>";
        } else if ($resultCheckEmail == "true") {
            $message = "<p class='mt-2 text-danger'><i class='icon-info2'></i> Email đã tồn tại</p>";
        } else {
            $resultInsert = $this->user->InsertNewUser($fullname, $dob, $city, $username, $password, $role, $email, $token, $status);
            if ($resultInsert == "true") {
                $message = "<p class='mt-2 text-success'><i class='icon-info2'></i> Thêm người dùng mới thành công</p>";
            } else {
                $message = "<p class='mt-2 text-danger'><i class='icon-info2'></i> Thêm mới dùng mới thất bại</p>";
            }
        }
        return $message;
    }
    public function Action()
    {
        $resultMessage = "";
        $valueID = '';
        if ($this->request->isQuery("userID")) {
            $valueID = $this->request->getQuery("userID");
            $result = $this->user->checkUserID($valueID);
            if ($result == 'false') {
                exit("aaa");
                header("Location:" . DOMAINADMIN . "/usercontrol");
            }
        }
        //Kiểm tra thông người dùng nhập vào
        if ($this->request->isPost("addUser")) {
            if ($this->request->isPost("id")) {
                $id = $this->request->getPost("id");
                $result = $this->user->checkUserID($id);
                if ($result == 'true') {
                    exit("Update");
                } else {
                    exit("Insert");
                }
                $resultMessage = $this->AddUser();
            }
        }
        $this->view("AdminLayout", [
            "page" => "UserControl",
            //Lấy danh dách người dùng
            "listUsers" => $this->user->ShowUsers(),
            //Lấy kết quả thêm mới người dùng
            "resultMessage" => $resultMessage,
            //Lấy danh sách tỉnh thành
            "listProvince" => $this->user->ShowListProvince(),
            //Chi tiết user
            "detailUser" => $this->user->detailUser($valueID),
        ]);
    }
}
