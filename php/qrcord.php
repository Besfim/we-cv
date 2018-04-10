<?php  error_reporting(E_ALL ^ E_DEPRECATED);
require_once("function.php");
connect();
qrcord();
$id=$_GET['id'];
$type=$_GET['type'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>简历帮</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
	body{ background-color:#45a1b6;}
	.biaoti{ text-align:center; margin-top:30px;}
	.inp{ width:80%; background-color: #FFF ; margin:0 auto;
	margin-top:30px;
	 box-shadow:4px 4px 6px  #000000; padding-top:6px;
	 padding-bottom:15px;
	 border-radius:7px;
	 text-align:center;
	} 
	.inp p{ color: #CCC; font-size:16px;}
	.cr{ color:#FFF; text-align:center; font-size:10px; position:relative;top:45px;}
	</style>
    </head>
    <body>
    <div class="biaoti">
    <img src="../img/logo.png" width="162" height="44">
    </div>
    <div class="inp">
    <h3><strong><?php echo $row['name'] ?>的简历</strong></h3>
    <p>请扫描一下二维码以查看</p>
    <div id='code'></div>
    </div>
    <div class=" cr">
    <p>CopyRight 2016-2016 NCT</p>
    </div>
    </body>
    </html>
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.qrcode.min.js"></script> 
<script type="text/javascript">
$(function(){
<?php if($id&&$type) { ?>
$('#code').qrcode("http://www.muyuchengfeng.top/weCV/php/cvindex.php?id=<?php echo $id ?>&type=<?php echo $type ?>");})
<?php } ?>
</script>