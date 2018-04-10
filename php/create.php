<?php  error_reporting(E_ALL ^ E_DEPRECATED);
require_once("function.php");
connect();
if(!isset($_COOKIE['id']))
	exit;
if(isset($_POST['type']))
	{$type=$_POST['type'];
	if($type==1) createmodel1();
	else if($type==2) createmodel2();
	}
else
	{$type=$_GET['type'];
	if($type==1) createmodel1();
	else if($type==2) createmodel2();
	}
header("location:../mycv.html");
?>