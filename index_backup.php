<?php

session_start();
define('APPLICATION_PATH', getcwd());
require_once APPLICATION_PATH . '/mvc/Bridge.php';

if (DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

$notoli = new Route();
