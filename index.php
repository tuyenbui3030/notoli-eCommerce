<?php
session_start();
define('APPLICATION_PATH', getcwd());
require_once APPLICATION_PATH . '/mvc/Bridge.php';
//require_once "./mvc/Bridge.php";
$notoli = new Route();
?>