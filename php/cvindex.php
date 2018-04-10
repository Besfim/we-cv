<?php  error_reporting(E_ALL ^ E_DEPRECATED);
require_once("function.php");
connect();
cvindex();
if(!$row['open'])
	if($row['account_id']!=$_COOKIE['id'])
		header("location:../noright.html");
if($type==1)
	{$speciality =explode('；',$row['speciality']);
	$hobby = explode('；',$row['hobby']); 
	?>	
	<!doctype html>
	<html>
	<head>	
	<meta charset="utf-8">
	<title>无标题文档</title>
	</head>
	<body>
<?php if($_COOKIE['id']==$row['account_id']) { ?>
<div style="height:50px;height:20px;position:fixed;top:0px;left:50%;margin-left:160px;background:lightskyblue"><a href="javascript:var delete_url='delete.php?id=<?php echo $row['id']?>&type=<?php echo $type?>';var isdelete=confirm('确定删除？');if(isdelete) location=delete_url;">删除</a></div>
<?php } ?>
	<p><?php echo $row['name']; ?></p>
	<p><?php if($row['gender']) echo "男"; else echo "女"; ?></p>
	<p><?php echo $row['age']; ?></p>
	<p><?php echo $row['major']; ?></p>
	<p><?php echo $row['class']; ?></p>
	<p><?php echo $row['department']; ?></p>
	<p><?php 
		for($i=0;$i<count($speciality);$i++)
			echo $speciality[$i]."<br>";
		?></p>
	<p><?php 
		for($i=0;$i<count($hobby);$i++)
			echo $hobby[$i]."<br>";
		?></p>
	<p><?php echo $row['else_title']; ?></p>
	<p><?php echo $row['else_main']; ?></p>
	</body>
	</html>
<?php } else if($type==2) { ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $row['cvname'] ?></title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	.mynar{background-color: #01A5B1;opacity:0.95;}
	.fanhui{ color:#FFF; position:relative; top:10px; font-size:22px;}
	.tianxie{color:#FFF; font-size:18px; position: relative;left:40%; top:9px;margin:8px;margin-left:20px;}
	.bgp{width:374px; margin:0 auto; overflow:hidden; height:1558px;}
	.one{ color: #C00; position:relative; top:-1512px; left:35px;}
	.two{ color: #C00; position:relative; top:-1368px; left:165px;}
    .three{ color:#C00; position:relative; top:-1234px; left:22px; width:250px; height:236px; white-space:normal; overflow:hidden;}
	.four{ color:#C00; position:relative; top:-1075px; left:63px; width:253px; height:177px; white-space:normal; overflow:hidden;}
	.five{ color:#C00; position:relative; top:-888px; left:71px; width:293px; height:196px; white-space:normal; overflow:hidden;}
    </style>
  </head>
<body>
<?php if(isset($_COOKIE['id'])) {
	if($_COOKIE['id']==$row['account_id']) { ?>
  <nav class="navbar navbar-default navbar-fixed-top mynar">
 	 <div class="container">
 	<a href="../mycv.html" class="fanhui"><span class="glyphicon glyphicon-menu-left"></span></a>
<?php if($row['open']==0) { ?>
<a class="tianxie" href="javascript:var publish_url='publish.php?id=<?php echo $row['id']?>&type=<?php echo $type?>&open=1';var ispublish=confirm('确定发布？');if(ispublish) location=publish_url;">发布</a>
<?php }else { ?>
<a class="tianxie" href="javascript:var publish_url='publish.php?id=<?php echo $row['id']?>&type=<?php echo $type?>&open=0';var ispublish=confirm('取消发布？');if(ispublish) location=publish_url;">取消发布</a>
<?php }} ?>
<a class="tianxie" href="javascript:var delete_url='delete.php?id=<?php echo $row['id']?>&type=<?php echo $type?>';var isdelete=confirm('确定删除？');if(isdelete) location=delete_url;">删除</a>
  	</div>
  </nav>
<?php } ?>

  <div class="bgp">
   <div>
  	<img src="../img/previewmodel2.jpg"  width="374px"/>
  </div>
    <div class="one">
  		<h1><strong><?php echo $row['cvname'] ?></strong></h1>
    	<p> 姓名：<?php echo $row['name'] ?></p>
  	</div>
  	<div class="two">
 		 <p>性别：<?php if($row['gender']) echo "男"; else echo "女"; ?></p>
  		<p>专业：<?php echo $row['major'] ?></p>
  		<p>班级：<?php echo $row['class'] ?></p>
  		<p>QQ：<?php echo $row['qq'] ?></p>
  		<p>电话：<?php echo $row['tel'] ?></p>
  		<p>意向部门：<?php echo $row['department'] ?></p>
  	</div>
 <div class="three">
<p>才艺技能:</p>
<p><?php echo $row['skill'] ?></p>
 </div>
 <div class="four">
 <p>获得奖项</p>
 <p>
 <?php echo $row['reward'] ?>
 </p>
 </div>
 <div class="five">
 <p>对部门的期望</p>
 <p><?php echo $row['expect'] ?></p>
 </div>
    </div>
</body>
</html>
<?php } ?>