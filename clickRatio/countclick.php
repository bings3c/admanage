<?php
// date_default_timezone_set('PRC'); 
ini_set('date.timezone','Asia/Shanghai');
$db=mysql_connect("localhost","root","")or die("can't connect".mysql_error());;
mysql_select_db("admanage",$db)or die("select db wrong!");
mysql_query("SET NAMES 'utf8'");

$adID=$_POST['ID'];

$updateAd = mysql_query("UPDATE adeffect SET AdClick = AdClick +1,AdShow=AdShow+1,AdShowPeo=adShowPeo+1,AdClickPeo=AdClickPeo+1 WHERE AdID='$adID'");//暂时把adID固定
$updateAdhost= mysql_query("UPDATE adhost SET AdHostMoney = AdHostMoney -1 WHERE AdHostTel='18910233822' and AdHostID='$adID' ");//暂时把hostTel固定
$updateUser= mysql_query("UPDATE aduser SET RemainPoints=RemainPoints+1,UserShow=UserShow+1,UserClick=UserClick+1  WHERE AdUserPhone='18811720067'");//暂时把tel固定

$sql=mysql_query("select * from adeffect where AdID='$adID'");
$sqlID = mysql_fetch_array($sql);
$ID=$sqlID['AdID'];
$clickTime=date('Y-m-d H:i:s');

//获取y-m-d格式日期
$ymdvalue=explode(" ", $clickTime)['0'];
//获取h:i:s格式日期
$datevalue=explode(" ", $clickTime)['1'];
//获取m月份和d天
$yvalues=explode("-",$ymdvalue)['0'];
$yvalue=intval($yvalues);//整型
$mvalues=explode("-", $ymdvalue)['1'];
$mvalue=intval($mvalues);//整型
$dvalues=explode("-", $ymdvalue)['2'];
$dvalue=intval($dvalues);//整型
//获取hh小时
$hvalues=explode(":", $datevalue)['0'];
$hvalue=intval($hvalues);
$opType='CPC';

$insertAdcount=mysql_query("insert into adlog (`AdID`,`OptTime`,`OptHour`,`OptDay`,`OptMonth`,`OptYear`,`optType`) values ('$ID','$clickTime','$hvalue','$dvalue','$mvalue','$yvalue','$opType')");
$click = mysql_query("select count(AdID) from adlog WHERE AdID='$ID' and OptDay = '$dvalue' and OptMonth='$mvalue' and OptYear='$yvalue' ");

while($row = mysql_fetch_array($click)) 
{ 
echo $row['count(AdID)']; 
} 





