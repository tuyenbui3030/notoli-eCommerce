<?php
class UserModel extends DB {
    public function InsertNewUser($register_username, $register_password, $register_email, $token) {
        $qr = "INSERT INTO users VALUES(null, '$register_username', '$register_password', '$register_email', '$token', 0)";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function VerifyNewUser($token) {
        $qr = "UPDATE users SET verified = b'1' WHERE token = '$token'";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
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
}
?>