<?php  error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type:application/json;charset=utf-8");
require_once("function.php");
connect();
getmycv();
?>