<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <?php date_default_timezone_set("Asia/Shanghai");?>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>

<?php 
session_start();
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "login.php"; 
	include "siteview.php";
}else{
	include "LoginSuccess.php";
	include "userview.php";
};
?>

<img src="img/vec_logo2.jpg" width=800 height="310" />	
<div id="layout">
<style>
	#layout{ width:970px;margin:0 auto;text-decoration:none; font-family:"微软雅黑"; font-size:18px; text-align:left !important; text-align:center; }
	body{text-align:center}
	a:visited  {color:#FFF;text-decoration:none;}
    a:link {color:#FFF;text-decoration:none;}
	a:active {color:#0FF; text-decoration:none;}
</style>

	<!--导航栏-->
	<?php 
		include "common/table.php"; 
	?>
	<!--end of 导航栏-->
	<div style="height:400px; width:700px; background-color:#000; margin:0 auto; margin-top:80px; clear:both; border-radius: 5px;">
		<p align="center" style="color:#FFF; padding-top:15px; font-size:24px;">新片推荐</p>
		<div style="width:700px;margin-top:15px;;">
            <a href="movieDetail.php?id=23&typeId=2">
            <!--<div width="250px" height="300px" style="position: relative;">-->
            <img src="img/daoshi.jpg" width="200px" height="280px" style="margin:5px auto auto 25px; float:left" />
            <!--<span class="begin_show"></span></div>-->
            </a>
            <a href="movieDetail.php?id=85&typeId=3"><img src="img/zhanxing.jpg" width="200px" height="280px" style="margin:5px auto auto 25px; float:left"  /></a>
			<a href="movieDetail.php?id=89&typeId=1"><img src="img/zhiwode.jpg" width="200px" height="280px" style="margin:5px auto auto 25px; float:left" /></a>
		</div>
	</div>
	
<?php
	require('common/footer.php');
?>
