<?php
class UserModel extends DB
{
    //Insert User
    public function InsertNewUser($register_fullname, $register_birthday, $register_city, $register_username, $register_password, $register_role, $register_email, $token, $verify)
    {
        $qr = "INSERT INTO users VALUES(null, '$register_fullname', '$register_username', '$register_password', '$register_role', '$register_email', '$token', $verify, '$register_city', '$register_birthday')";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Xác minh User
    public function VerifyNewUser($token, $newToken)
    {
        $qr = "UPDATE users SET user_verified = b'1', user_token = '$newToken' WHERE user_token = '$token'";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if ($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Kiểm tra User đã tồn tại
    public function checkUsername($username)
    {
        $qr = "SELECT user_id FROM users
        WHERE user_username = '$username'";
        $rows = mysqli_query($this->con, $qr);

        $result = false;
        if (mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }

    //Kiểm tra Email đã tồn tại
    public function checkEmail($email)
    {
        $qr = "SELECT user_id FROM users
        WHERE user_email = '$email'";
        $rows = mysqli_query($this->con, $qr);
        $result = false;
        if (mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy danh sách tỉnh thành
    public function ShowListProvince()
    {
        $qr = "SELECT * FROM province";
        return mysqli_query($this->con, $qr);
    }
    //Đăng nhập
    public function loginPageModel($username, $password)
    {
        $query = "SELECT * FROM users WHERE user_username = '$username' AND user_verified = 1";
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if (password_verify($password, $row["user_password"])) {
                    return json_encode(true);
                } else {
                    return json_encode(false);
                }
            }
        }
        return json_encode(false);
    }
    //Kiểm tra Token có tồn tại
    public function checkToken($token)
    {
        $qr = "SELECT user_id FROM users
        WHERE user_token = '$token'";
        $rows = mysqli_query($this->con, $qr);

        $result = false;
        if (mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Select token;
    public function SelectToken($email)
    {
        $query = "SELECT user_token FROM users WHERE user_email = '$email'";
        $result = mysqli_query($this->con, $query);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows["user_token"]);
    }
    //Update password;
    public function UpdatePassword($email, $newPassword, $token, $newToken)
    {
        $qr = "UPDATE users SET user_password = '$newPassword', user_token = '$newToken' WHERE user_token = '$token' AND user_email ='$email'";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if ($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    ///////Đoạn code dành cho Admin////////
    public function ShowUsers()
    {
        $qr = "SELECT * FROM users JOIN province ON user_address = province_id";
        return mysqli_query($this->con, $qr);
    }
    //Kiểm tra UserID có trong hệ thống hay không
    public function checkUserID($user_id)
    {
        $qr = "SELECT user_id FROM users WHERE user_id = $user_id";
        $rows = mysqli_query($this->con, $qr);
        $result = false;
        if (mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Show thông tin của 1 user
    public function detailUser($user_id)
    {
        $qr = "SELECT * FROM users JOIN province ON user_address = province_id WHERE user_id = $user_id";
        return mysqli_query($this->con, $qr);
    }
}
