<?php
class UserModel extends DB {
    public function InsertNewUser($register_username, $register_password, $register_email, $token, $verified) {
        $qr = "INSERT INTO users VALUES(null, '$register_username', '$register_password', '$register_email', '$token', '$verified')";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
}
?>