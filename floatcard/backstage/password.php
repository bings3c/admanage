<?php
        require_once('../connect.php');
		$sql4="select * from floatcard";
		$query4=mysql_query($sql4);
		$res=mysql_fetch_array($query4);
		echo $res['TrafficCardPwd'];
?>