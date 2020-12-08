<?php
require_once "config.php";
class DB {
    public $con;
    protected $serverName = SERVER;
    protected $userName = USERNAME;
    protected $password = PASSWORD;
    protected $dbName = DBNAME;


    protected $emailUsername = EMAIL_USER;
    protected $emailPassword = EMAIL_PASSWORD;
    
    
    function __construct() {
        $this->con = mysqli_connect($this->serverName, $this->userName, $this->password);
        mysqli_select_db($this->con, $this->dbName);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
}
?>