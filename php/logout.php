<?php  error_reporting(E_ALL ^ E_DEPRECATED);
require_once("function.php");
logout();
header("location:../login.html");
?>