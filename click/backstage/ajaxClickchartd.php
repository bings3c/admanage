<?php  
      include 'connect.php';
      date_default_timezone_set('Asia/Shanghai');
      $Now=date("Y-m-d H:i:s");
      $ymd=explode(" ", $Now)['0'];//获取今天Y-m-d
      $Years=explode("-", $ymd)['0'];//获取当前年份
      $Year=intval($Years);//整型
      $thisMonths=explode("-", $ymd)['1'];//获取当前月份
      $thisMonth=intval($thisMonths);//整型
      $todays=explode("-", $ymd)['2'];//获取今天d
      $today=intval($todays);
      
      $yesterday_ymd=date("Y-m-d",strtotime("-1 day"));//昨天Y-m-d
      $yesterdays=explode("-",$yesterday_ymd)['2'];//获取昨天d
      $yesterday=intval($yesterdays);//整型
  
      $lastMonth_ymd=date("Y-m-d",strtotime("last month"));//上个月Y-m-d
      $lastMonths=explode("-",$lastMonth_ymd)['1'];//上个月m
      $lastMonth=intval($lastMonths);//整型

      $lastYear_ymd=date("Y-m-d",strtotime("-1 years"));//去年Y-m-d
      $lastYears=explode("-",$lastYear_ymd)['0'];//去年y
      $lastYear=intval($lastYears);//整型

      $timeSignal=$_GET['time'];//today? yesterday?
 
     //  switch ($timeSignal) {
     //    case 'today':
     //      $sql="select * from `adlog` where `Day`='$today' and `Month`='$thisMonth' and `OptYear`='$OptYear' ";
     //      break;
        
     //    case 'yesterday':
     //      if($today==1){
     //          if($thisMonth==1){
     //            $sql="select * from `adlog` where `Day`='$yesterday' and `Month`='$lastMonth' and `OptYear`='$lastOptYear' ";
     //          }else{
     //            $sql="select * from `adlog` where `Day`='$yesterday' and `Month`='$lastMonth' and `OptYear`='$OptYear' ";
     //          }
          
     //      }else{
     //        $sql="select * from `adlog` where `Day`='$yesterday' and `Month`='$thisMonth' and `OptYear`='$OptYear' ";
     //      }
     //      break;
     //  }

      
     //  $query=mysql_query($sql);
     //  if($query&&mysql_num_rows($query)){
     //    while ($row=mysql_fetch_assoc($query)) {
     //      $value[]=$row['clickTime'];
     //    }
     //  }
     //  //print_r($value);
     //  //获取yy-mm-dd格式的时间数组
     //  $ymdvalue= array();
     //     foreach($value as $yvalue){
     //     $ymd_value=explode(" ", $yvalue)['0'];
     //     array_push($ymdvalue,$ymd_value);
     //  }

     //  //获取hh:mm:ss格式的时间数组
     //  $hvalue= array();
     //     foreach($value as $dvalue){
     //     $datevalue=explode(" ", $dvalue)['1'];
     //     array_push($hvalue,$datevalue);
     //  }
     // //print_r($hvalue);
     
     //  //获取mm时间数组
     //  $datam=array();
     //    foreach($ymdvalue as $mval){
     //    $thisMonth=explode("-", $mval)['1'];
     //    array_push($datam,$thisMonth);
     //  }
     //  //print_r($datam);

     //   //获取dd时间数组
     //  $datad=array();
     //    foreach($ymdvalue as $dval){
     //    $dvalue=explode("-", $dval)['2'];
     //    array_push($datad,$dvalue);
     //  }
     //  //print_r($datad);


     // //获取hh时间数组
     //  $datah=array();
     //    foreach($hvalue as $hval){
     //    $rvalue=explode(":", $hval)['0'];
     //    array_push($datah,$rvalue);
     //  }


      $clicks=array();
      for($i=0;$i<=23;$i++){
        if($timeSignal=='today'){
          $sql="select count(AdID) from adlog where `OptHour`='$i' and `OptDay`='$today' and `OptMonth`='$thisMonth' and `OptYear`='$Year' ";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
        }else{
          if($today==1){
            if ($thisMonth==1) {//----------一月1号
              $sql="select count(AdID) from adlog where `OptHour`='$i' and `OptDay`='$yesterday' and `OptMonth`='$lastMonth' and `OptYear`='$lastYear' ";
            }else{//其他月份1号
              $sql="select count(AdID) from adlog where `OptHour`='$i' and `OptDay`='$yesterday' and `OptMonth`='$lastMonth' and `OptYear`='$Year' ";
            }
            
          }else{//非1号
            $sql="select count(AdID) from adlog where `OptHour`='$i' and `OptDay`='$yesterday' and `OptMonth`='$thisMonth' and `OptYear`='$Year' ";
          }
        }
      
        $res=mysql_query($sql);  
        $row=mysql_fetch_array($res);

        array_push($clicks,$row['count(AdID)']);
      }
      echo json_encode($clicks);
  
?>
