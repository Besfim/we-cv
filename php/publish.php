<?php  error_reporting(E_ALL ^ E_DEPRECATED);
require_once("function.php");
connect();
publish();
header("location:../mycv.html");
?>