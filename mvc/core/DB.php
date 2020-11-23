<?php
class DB {
    public $con;
    protected $serverName = "localhost";
    protected $userName = "root";
    protected $password = "";
    protected $dbName = "notoli";

    function __construct() {
        $this->con = mysqli_connect($this->serverName, $this->userName, $this->password);
        mysqli_select_db($this->con, $this->dbName);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
}
?>