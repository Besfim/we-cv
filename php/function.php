<?php  
function connect()
	{$link=mysql_connect("localhost","root","muyuchengfeng") or die ("Error:fail to connect to server");
	$db=mysql_select_db("wecv",$link) or die("Error:fail to connect to database");
	mysql_query('set names utf8');
	}
function login()
	{
		$data=$_POST;
		if($data['name']==''||$data['password']=='')
		{
			echo 0;
			return;
		}
	$sql="select * from account where name='".$data['name']."' and password='".$data['password']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	if(!$row)
		echo 0;
	else
		{setcookie('id',$row['id'],time()+86400,'/weCV/');
		echo 1;}
	}
function logout()
	{setcookie('id',NULL,time(),'/weCV/');
	}
function register()
	{$data=$_POST;
	if(strlen($data['name'])>25)
		{echo -1;return;}
	if($data['name']==''||$data['password']=='')
		{echo -2;return;}
	$sql="select * from account where name='".$data['name']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	if(!$row)
		{$date=date("Y-m-d");
		$sql="insert account (name,password,register_date) values ('".$data['name']."','".$data['password']."','".$date."')";
		$result=mysql_query($sql);
		$id=mysql_insert_id();
		setcookie('id',$id,time()+86400,'/weCV/');
		echo 1;
		}
	else
		echo 0;
	}
function getmycv()
	{$id=$_COOKIE['id'];
	$sql="select * from a_model where account_id=".$id."";
	$result=mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)) 
		$data[] = $row;
	echo json_encode($data, JSON_UNESCAPED_UNICODE);  
	}
function getmain()
	{$id=$_COOKIE['id'];
	$sql="select * from account where id=".$id."";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	$sql1="select count(*) from a_model	where account_id=".$id."";
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	$data[]=$row['name'];
	$now=date("Y-m-d");
	$d1 = strtotime($now);
	$d2 = strtotime($row['register_date']);
	$data[]=$row1[0];
	$data[]=(string)(round(($d1-$d2)/3600/24)+1);
	echo json_encode($data, JSON_UNESCAPED_UNICODE);  
	}
function cvindex()
	{global $row;
	global $type;
	$id=$_GET['id'];
	$type=$_GET['type'];
	$sql="select * from model".$type." where id=".$id."";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	}
function delete()
	{$sql="delete from a_model where id='".$_GET['id']."'";
	$result=mysql_query($sql);
	$sql1="delete from model".$_GET['type']." where id='".$_GET['id']."'";
	$result1=mysql_query($sql1);
	}
function publish()
	{$sql="update model".$_GET['type']." set open=".$_GET['open']." where id=".$_GET['id']."";
	$result=mysql_query($sql);
	}
function qrcord()
	{global $row;
	$id=$_GET['id'];
	$type=$_GET['type'];
	$sql="select * from a_model inner join account where a_model.id=".$id." and a_model.account_id=account.id";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	}
function createmodel1()
	{$data=$_POST;
	$data['open']=0;
	$sql="insert a_model(type,account_id,name) values ('".$data['type']."','".$_COOKIE['id']."','".$data['mname']."')";
	$result=mysql_query($sql);
	$id=mysql_insert_id();
	$sql1="insert model1 (id,account_id,mname,open,name,gender,age,major,class,department,speciality,hobby,else_title,else_main) values (".$id.",'".$_COOKIE['id']."','".$data['mname']."','".$data['open']."','".$data['name']."','".$data['gender']."','".$data['age']."','".$data['major']."','".$data['class']."','".$data['department']."','".$data['speciality']."','".$data['hobby']."','".$data['else_title']."','".$data['else_main']."')";
	$result1=mysql_query($sql1);
	}
function createmodel2()
	{$data=$_POST;
	$sql="insert a_model (type,account_id,name) values ('".$_GET['type']."','".$_COOKIE['id']."','".$data['cvname']."')";
	$result=mysql_query($sql);
	$id=mysql_insert_id();
	$sql1="insert model2 (id,account_id,cvname,open,name,gender,major,class,department,qq,tel,skill,reward,expect) values (".$id.",'".$_COOKIE['id']."','".$data['cvname']."','".$_GET['open']."','".$data['name']."','".$data['gender']."','".$data['major']."','".$data['class']."','".$data['department']."','".$data['qq']."','".$data['tel']."','".$data['skill']."','".$data['reward']."','".$data['expect']."')";
	$result1=mysql_query($sql1);
	}
?>