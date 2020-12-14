<?php
class UserModel extends DB {
    //Insert User
    public function InsertNewUser($register_username, $register_password, $register_email, $token) {
        $qr = "INSERT INTO users VALUES(null, '$register_username', '$register_password', '$register_email', '$token', 0)";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Xác minh User
    public function VerifyNewUser($token, $newToken) {
        $qr = "UPDATE users SET verified = b'1', token = '$newToken' WHERE token = '$token'";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Kiểm tra User đã tồn tại
    public function checkUsername($username) {
        $qr = "SELECT id FROM users
        WHERE username = '$username'";
        $rows = mysqli_query($this->con, $qr);

        $result = false;
        if(mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Kiểm tra User đã tồn tại
    public function checkEmail($email) {
        $qr = "SELECT id FROM users
        WHERE email = '$email'";
        $rows = mysqli_query($this->con, $qr);

        $result = false;
        if(mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Đăng nhập
    public function loginPageModel($username, $password) {
        $query = "SELECT * FROM users WHERE username = '$username' AND 	verified = 1";
        $result = mysqli_query($this->con, $query);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){
                if(password_verify($password, $row["password"])) {
                    // $_SESSION["username"] = $username;
                    // header("location:index.php");
                    return json_encode(true);
                } else {
                    return json_encode(false);
                    //echo '<script>alert("Không thành công")</script>';
                }
            }
        }
        return json_encode(false);
    }
    //Kiểm tra Token có tồn tại
    public function checkToken($token) {
        $qr = "SELECT id FROM users
        WHERE token = '$token'";
        $rows = mysqli_query($this->con, $qr);

        $result = false;
        if(mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Select token;
    public function SelectToken($email) {
        $query = "SELECT token FROM users WHERE email = '$email'";
        $result = mysqli_query($this->con, $query);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows["token"]);
    }
    //Update password;
    public function UpdatePassword($email, $newPassword, $token, $newToken) {
        $qr = "UPDATE users SET password = '$newPassword', token = '$newToken' WHERE token = '$token' AND email ='$email'";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
}
?>