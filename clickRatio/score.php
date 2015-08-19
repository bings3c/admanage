<?php
	function pointsAdd($UserId,$AdType,$AdId) {
	$con=mysql_connect("localhost","root","");
	if (!$con){
  		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('admanage');
	mysql_query('set names utf8');


	$AdRate = "SELECT AdRate from AdMainInformation WHERE AdID=".$AdId" and AdType=".$AdType"";              //查询费率

	$sql = "UPDATE ad SET points = points + ".$AdRate" WHERE id=".$userId"";      //根据广告的类型，暂且这么规定，可改
	mysql_query($sql);


//	switch ($type) {
//		case 'CPM':
//			$sql = "UPDATE ad SET points = points + $AdRate WHERE id=$userId";      //根据广告的类型，暂且这么规定，可改
//			mysql_query($sql);
			break;
//		case 'CPA':
//			$sql = "UPDATE ad SET points = points + 2 WHERE id=$userId";      
//			mysql_query($sql);
//			break;
//		case 'CPC':
//			$sql = "UPDATE ad SET points = points + 100 WHERE id=$userId";     
//			mysql_query($sql);
//			break;
		
//		default:
//	}
	}
	
?>
