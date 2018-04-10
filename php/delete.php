<?php  error_reporting(E_ALL ^ E_DEPRECATED);
require_once("function.php");
connect();
delete();
header("location:../mycv.html");
?>